<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
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
    public function index(Restaurant $restaurant, User $user)
    {

        $user_id = Auth::id();

        $restaurant_exists = Restaurant::where('user_id', $user_id)->exists();

        if ($restaurant_exists) {

            $restaurant = Restaurant::with(['user'])->where('user_id', $user_id)->first();
            // dd($restaurant);

            return view('admin.noRestaurant.index', compact('restaurant_exists', 'restaurant'));

        }else {
            
            return view('admin.noRestaurant.index', compact('restaurant_exists'));
        }

        
    }
}
