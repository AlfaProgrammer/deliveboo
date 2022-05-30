<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Restaurant $restaurant)
    {

        $user_id = Auth::id();

        $restaurant_exists = Restaurant::where('user_id', $user_id)->exists();

        if ($restaurant_exists) {
            dd($restaurant_exists);
        }else {
            dd($restaurant_exists);
        }

        return view('admin.noRestaurant.index', /* compact('res_id') */);
    }
}
