<?php

namespace App\Http\Controllers\Admin;

use App\Food;
use App\Http\Controllers\Controller;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class FoodsController extends Controller {

    protected $foodRepo;

    public function __construct(FoodRepository $foodRepo) {
        $this->foodRepo = $foodRepo;
    }


    public function index(Request $request) {
        $params = $request->all();

        $foods = $this->foodRepo->search($params);

//        dd($foods[0]->nutrients->toArray());

        return view('backend.foods.index', compact('foods'));
    }


    public function search() {

    }

}
