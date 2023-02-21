<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return response()->json(compact('restaurants', 'categories'));
    }

    public function getByCategory($values)
    {
        $categoryChoice = explode(',', $values);
        $restaurants = Restaurant::with('categories')->whereHas('categories', function (Builder $query) use ($categoryChoice) {
            $query->whereIn('category_id', $categoryChoice)
                ->groupBy('restaurant_id')
                ->select('restaurant_id')
                ->havingRaw('COUNT(DISTINCT category_id) = ' . count($categoryChoice));
        })->get();

        return response()->json(compact('restaurants'));
    }
}
