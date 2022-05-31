<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Plate;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|url|string|max:255',
            'info' => 'nullable|string',
            'cap' => "required|min:5|max:5",
            'address' => 'required|string|max:80',
            'city' => 'required|max:30'
        ]);

        $data = $request->all();

        
        $slug = Restaurant::getUniqueSlug( $data['name']);

        $restaurant = new Restaurant();

        $restaurant->fill($data);

        $restaurant->user_id = Auth::id();

        $restaurant->slug = $slug;

        $restaurant->save();


        return redirect()->route('admin.home'); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

}
