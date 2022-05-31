<?php

namespace App\Http\Controllers\Admin;

use App\Allergen;
use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $res_id = Restaurant::getRestaurantId();

        $plates = Plate::with(['restaurant', 'allergens'])->where('restaurant_id', $res_id)->get();


        return view('admin.plates.index', compact('plates', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allergens = Allergen::all();

        return view('admin.plates.create', compact('allergens'));
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
            'description' => 'nullable|string',
            'price' => "required|numeric|min:0.00|max:999.99",
            'available' => 'required|boolean',
            'allergens' => 'exists:allergens,id',
        ]);

        $data = $request->all();

        
        $slug = Plate::getUniqueSlug( $data['name']);

        $plate = New Plate();

        $plate->fill($data);

        $plate->restaurant_id = Restaurant::getRestaurantId();

        $plate->slug = $slug;

        $plate->save();

        if (array_key_exists('allergens', $data)) {
            $plate->allergens()->attach($data['allergens']);
        } else {
            $plate->allergens()->attach([]);
        }

        // dd($plate);

        return redirect()->route('admin.plates.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit',compact('plate')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Plate $plate)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|url|string|max:255',
            'description' => 'nullable|string',
            'price' => "required|numeric|min:0.00|max:999.99",
            'available' => 'required|boolean'
        ]);

        $data = $request->all();

        if($plate->name != $data['name']){

            $slug = Plate::getUniqueSlug( $data['name']);
            $data['slug'] = $slug;
        } 
        
        $plate->update($data);

        // dd($plate);

        return redirect()->route('admin.plates.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route('admin.plates.index');
    }
}
