<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Plate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.restaurants.create', compact('categories'));
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
            'image' => 'nullable|file|image|mimetypes:image/jpeg,image/png|max:2048',
            'info' => 'nullable|string',
            'cap' => "required|min:5|max:5",
            'address' => 'required|string|max:80',
            'city' => 'required|max:30',
            'categories' => 'exists:categories,id',
        ]);

        $data = $request->all();

        if(array_key_exists('image', $data)) {
            $image_path = Storage::put('uploads', $data['image']);
            $data['image'] = $image_path;
        }

        
        $slug = Restaurant::getUniqueSlug( $data['name']);

        $restaurant = new Restaurant();

        $restaurant->fill($data);

        $restaurant->user_id = Auth::id();

        $restaurant->slug = $slug;

        $restaurant->save();

        if (array_key_exists('categories', $data)) {
            $restaurant->categories()->attach($data['categories']);
        } else {
            $restaurant->categories()->attach([]);
        }

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
