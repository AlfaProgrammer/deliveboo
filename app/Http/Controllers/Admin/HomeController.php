<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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

        // Questa funzionalità si potra utilizzare similmente quando inseriremo foreign-key di restaurant in users table
        // $restaurant_exists = Restaurant::where('user_id', $user_id)->exists();

        $user = Auth::user();
        $restaurant = $user->restaurant;
        return  view('admin.noRestaurant.index', compact('restaurant', 'user') );
        

        

<<<<<<< HEAD
            $restaurant = Restaurant::with(['user', 'categories'])->where('user_id', $user_id)->first();
=======
        // if ($restaurant_exists) {
>>>>>>> 1a04e2e8221bdd920c010d5a9a0c9da03f4b18b9

        //     $restaurant = Restaurant::with(['user'])->where('user_id', $user_id)->first();
        //     // dd($restaurant);

        //     return view('admin.noRestaurant.index', compact('restaurant_exists', 'restaurant'));

        // }else {
            
        //     return view('admin.noRestaurant.index', compact('restaurant_exists'));
        // }

        
    }
}
