<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;
use App\Order;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        dd($request);

        $plates = Plate::with('orders')->get();
        
        foreach ($plates as $plate) {

            foreach ($plate->orders as $order) {
                # code...
               $quantity = $order->pivot;

               dd($quantity);
            }

            // dd($plate);

        }
        // $quantity = $plates->pivot->quantity;
        // $plates->load('orders');

        return response()->json([
            'plates'=> $plates,
            // 'quantity'=>$quantity
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
