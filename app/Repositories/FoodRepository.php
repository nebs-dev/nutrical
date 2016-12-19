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
        $sql       = "SELECT food.* FROM foods food
                INNER JOIN food_categories cat ON cat.id = food.food_category_id ";

        # Title
        if (isset($params['title'])) {
            $sql .= "WHERE food.title LIKE :title OR cat.title LIKE :cat_title";
            $sqlParams['title']     = '%' . $params['title'] . '%';
            $sqlParams['cat_title'] = '%' . $params['title'] . '%';
        }

        $foods = DB::select($sql, $sqlParams);

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
