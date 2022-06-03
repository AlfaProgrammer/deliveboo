<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parameters = $request->query('category');

        if($parameters) {
            $restaurants = Restaurant::with(['categories'])
                ->whereHas('categories', function ($q) use ($parameters) {
                    $q->where('category_restaurant.category_id', $parameters);
                })->get();

            return response()
                ->json(
                    [
                        'restaurant' => $restaurants,
                        'succes' => true,
                    ]
                );
        }
        //dump($parameters);

        $restaurants = Restaurant::with(['categories', 'plates'])
            ->get();

        $categories = Category::all();

        return response()
            ->json(
                [
                    'restaurants' => $restaurants,
                    'categories' => $categories,
                    'success' => true,
                ],
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::with(['categories',])
            ->where('slug', $slug)
            ->first();

        $plates = $restaurant->plates()
            ->where('available', 1)->get();

            return response()
            ->json(
                [
                    'restaurant' => $restaurant,
                    'plates' => $plates,
                    'success' => true,
                ],
            ); 
    }

}
