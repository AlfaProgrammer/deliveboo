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

        /* $restaurants = Restaurant::select('user_id')->get(); */

        $restaurants = Restaurant::all();
        /* $funzione = DB::table('users')->whereExists(function($query){
            $query->select(DB::raw(1))->from('restaurants')->whereColumn('restaurants.user_id', Auth::id());
        })->get(); */

        $prova = Restaurant::where('user_id', $user_id)->exists();

        if ($prova) {
            dd($prova);
        }else {
            dd($prova);
        }



        /* if ( ) {
            dd('Ciao');
        } */

        /* $user_restaurant = Restaurant:: */
        /* $res_id = Restaurant::getRestaurantId(); */

        return view('admin.noRestaurant.index', /* compact('res_id') */);
    }
}
