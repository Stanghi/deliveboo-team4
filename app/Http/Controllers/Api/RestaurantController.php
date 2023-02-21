<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return response()->json(compact('restaurants', 'categories'));
    }

    public function getByCategory($values) {
        // $stringValues = str_replace(',','', $values);
        // $categoryChoice = str_split($stringValues);
        // if(str_contains($values, ',')) {

        // }
        $categoryChoice = explode(',',$values );
        $restaurants = Restaurant::with('categories')->whereHas('categories', function(Builder $query) use($categoryChoice) {
            $query->whereIn('category_id', $categoryChoice)
              ->groupBy('restaurant_id')
              ->havingRaw('COUNT(DISTINCT category_id) = '.count($categoryChoice));
        })->get();

        return response()->json(compact('restaurants'));


        // $list_restaurants = [];
        // $categories = Category::where('id', $values)->with(['restaurants'])->first();
        // foreach ($categories->restaurants as  $restaurant) {
        //     $list_restaurants[] = Restaurant::where('id', $restaurant->id)->with(['categories'])->first();
        // }
        // return response()->json($list_restaurants );
    }
}
