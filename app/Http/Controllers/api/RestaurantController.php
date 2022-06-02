<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with(['categories', 'plates'])
            ->get();

        return response()
            ->json(
                [
                    'restaurants' => $restaurants,
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
        $restaurant = Restaurant::with(['categories'])
            ->where('slug', $slug)
            ->first();

        $plates = $restaurant->plates()->where('available', 1)->get();

            return response()
            ->json(
                [
                    'restaurant' => $restaurant,
                    'plates' => $plates,
                    'success' => true,
                ],
            ); 
        //dd($restaurant);
    }

}
