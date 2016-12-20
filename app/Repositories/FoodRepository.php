<?php

namespace App\Repositories;

use App\Food;
use App\FoodCategory;
use App\Nutrient;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FoodRepository {

    private $proteinHighValue      = 10;
    private $proteinLowValue       = 2;
    private $carbohydrateHighValue = 10;
    private $carbohydrateLowValue  = 2;
    private $sugarHighValue        = 10;
    private $sugarLowValue         = 2;
    private $fatHighValue          = 10;
    private $fatLowValue           = 2;

    private function getOperator($param) {
        return $param == 'high' ? '>=' : '<=';
    }

    private function getProteinValue($param) {
        return $param == 'high' ? $this->proteinHighValue : $this->proteinLowValue;
    }

    private function getCarbohydrateValue($param) {
        return $param == 'high' ? $this->carbohydrateHighValue : $this->carbohydrateLowValue;
    }

    private function getSugarValue($param) {
        return $param == 'high' ? $this->sugarHighValue : $this->sugarLowValue;
    }

    private function getFatValue($param) {
        return $param == 'high' ? $this->fatHighValue : $this->fatLowValue;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll() {
        return Food::with('nutrients')->paginate(10);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function search($params) {
        $sqlParams = [];
        $sql       = "SELECT DISTINCT food.* FROM foods food
        INNER JOIN food_categories cat ON cat.id = food.food_category_id
        INNER JOIN food_has_nutrients fhn ON fhn.food_id = food.id
        INNER JOIN nutrients n ON n.id = fhn.nutrient_id
        WHERE fhn.food_id = food.id ";

        # Title
        if (isset($params['title'])) {
            $sql .= "AND (food.title LIKE :title OR cat.title LIKE :cat_title) ";
            $sqlParams['title']     = '%' . $params['title'] . '%';
            $sqlParams['cat_title'] = '%' . $params['title'] . '%';
        }

        # Protein
        if (isset($params['protein']) && ($params['protein'] == 'high' || $params['protein'] == 'low')) {
            $operator = $this->getOperator($params['protein']);
            $value    = $this->getProteinValue($params['protein']);
            $sql .= "AND ({$this->getNutrientSubQuery($operator, 'Protein', $value)}) > 0 ";

            // $sql .= $where . "fhn.food_id = food.id AND (n.title = 'Protein' AND fhn.value <= 2) ";
        }

        # Carbohydrate
        if (isset($params['carbohydrate']) && ($params['carbohydrate'] == 'high' || $params['carbohydrate'] == 'low')) {
            $operator = $this->getOperator($params['carbohydrate']);
            $value    = $this->getCarbohydrateValue($params['carbohydrate']);
            $sql .= "AND ({$this->getNutrientSubQuery($operator, 'Carbohydrate, by difference', $value)}) > 0 ";
        }

        # Sugar
        if (isset($params['sugar']) && ($params['sugar'] == 'high' || $params['sugar'] == 'low')) {
            $operator = $this->getOperator($params['sugar']);
            $value    = $this->getSugarValue($params['sugar']);
            $sql .= "AND ({$this->getNutrientSubQuery($operator, 'Sugars, total', $value)}) > 0 ";
        }

        # Fat
        if (isset($params['fat']) && ($params['fat'] == 'high' || $params['fat'] == 'low')) {
            $operator = $this->getOperator($params['fat']);
            $value    = $this->getFatValue($params['fat']);
            $sql .= "AND ({$this->getNutrientSubQuery($operator, 'Total lipid (fat)', $value)}) > 0 ";
        }

        // dd($sql);

        $foods = DB::select(DB::raw($sql), $sqlParams);

        $pageNumber = Input::get('page', 1);
        $perpage    = 10;
        $slice      = array_slice($foods, $perpage * ($pageNumber - 1), $perpage);

        $foods = new LengthAwarePaginator($slice, count($foods), $perpage);

        foreach ($foods as &$food) {
            $food->category  = $this->getCategory($food);
            $food->nutrients = $this->getNutrients($food);
        }

        $foods->setPath('foods');
        $queryString = array_except(Input::query(), $foods->getPageName());
        $foods->appends($queryString);
        return $foods;
    }

    /*
    SELECT food.* FROM foods food
    INNER JOIN food_categories cat ON cat.id = food.food_category_id
    INNER JOIN food_has_nutrients fhn ON fhn.food_id = food.id
    INNER JOIN nutrients n ON n.id = fhn.nutrient_id

    WHERE fhn.food_id = food.id

    AND
    (SELECT COUNT(n.id) FROM nutrients n
    INNER JOIN food_has_nutrients fhn ON n.id = fhn.nutrient_id
    WHERE fhn.food_id = food.id AND (n.title = 'Protein' AND fhn.value >= 10) ) > 0
    AND
    (SELECT COUNT(n.id) FROM nutrients n
    INNER JOIN food_has_nutrients fhn ON n.id = fhn.nutrient_id
    WHERE fhn.food_id = food.id AND (n.title = 'Sugars, total' AND fhn.value <= 2) ) > 0
    AND
    (SELECT COUNT(n.id) FROM nutrients n
    INNER JOIN food_has_nutrients fhn ON n.id = fhn.nutrient_id
    WHERE fhn.food_id = food.id AND (n.title = 'Total lipid (fat)' AND fhn.value <= 2) ) > 0

    GROUP BY food.id
     */

    private function getNutrientSubQuery($operator, $title, $value) {
        $sql = "SELECT COUNT(n.id) FROM nutrients n
        INNER JOIN food_has_nutrients fhn ON n.id = fhn.nutrient_id
        WHERE fhn.food_id = food.id AND (n.title = '{$title}' AND fhn.value {$operator} {$value}) ";

        return $sql;
    }

    /**
     * @param $food
     * @return mixed
     */
    private function getCategory($food) {
        return FoodCategory::where('id', $food->food_category_id)->first();
    }

    /**
     * @param $food
     * @return static
     */
    private function getNutrients($food) {
        $nutrients = DB::table('nutrients')
            ->join('food_has_nutrients', 'nutrient_id', '=', 'nutrients.id')
            ->where('food_has_nutrients.food_id', $food->id)
            ->select('nutrients.*')
            ->get();

        foreach ($nutrients as &$nutrient) {
            $nutrient->pivot = $this->getNutrientPivot($nutrient, $food);
        }

        $nutrients = collect($nutrients)->map(function ($x) {return (array) $x;});
        return $nutrients;
    }

    /**
     * @param $nutrient
     * @param $food
     * @return mixed
     */
    private function getNutrientPivot($nutrient, $food) {
        $pivot = DB::table('food_has_nutrients')
            ->where('nutrient_id', '=', $nutrient->id)
            ->where('food_id', $food->id)
            ->select('food_has_nutrients.*')
            ->get();

        $pivot = collect($pivot)->map(function ($x) {return (array) $x;});
        return $pivot->first();
    }

}
