<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\FoodTransformer;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;

class FoodsController extends ApiController {

    protected $foodTransformer;
    protected $foodRepo;

    public function __construct(FoodTransformer $foodTransformer, FoodRepository $foodRepo) {
        $this->foodTransformer = $foodTransformer;
        $this->foodRepo        = $foodRepo;
    }

    public function index(Request $request) {
        $params = $request->all();

        $foods = $this->foodRepo->search($params);

        return $this->respondOk(
            $this->foodTransformer->transformCollection($foods->toArray())
        );

    }

}
