<?php

namespace App\Http\Controllers\Admin;

use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    public function index() {
//        $food = Food::find(1);
//
//        foreach ($food->nutrients as $n) {
//            echo $n->title;
//            echo ': ';
//            echo $n->pivot->value;
//            echo $n->pivot->created_at;
//            echo '<br>';
//        }
//
//        dd($food);

        return view('backend/dashboard');
    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}
