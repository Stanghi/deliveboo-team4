<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return response()->json(compact('restaurants', 'categories'));
    }

    public function search() {

        $searched = $_GET['searched'];

        $restaurants = Restaurant::where('name', 'like', "%$searched%")->with('categories')->get();


        return response()->json(compact('restaurants'));
    }
}
