<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\SendOrderCompleteMail;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'form.name' => 'required|string|max:30',
            'form.surname' => 'required|string|max:50',
            'form.email' => 'required|email|max:50',
            'form.phone_number' => 'required|string|min:10|max:20',
            'form.address' => 'required|string|max:80',
            'form.house_number' => 'required|string|max:10',
            'form.city' => 'required|string|max:30',
            'form.cap' => 'required|numeric|digits_between:1,5',
        ]);

        $data = $request->all();
        //return($data);

        $cart = $data['cart']['cartItems'];
        //return $cart;

        $total = $data['cart']['cartTotalPrice'];
        //return $total;

        //return $total;
        foreach($data as $value) {

            $order = new Order();

            $order->fill($value);

            $order->total_price = $total;

            $order->save();

            foreach($cart as $plate) {

                $plateId = $plate['id'];
                $plateQuantity = $plate['quantity'];

                $order ->plates()->attach($plateId,[
                    'quantity' => $plateQuantity,
                ]);
            }
            
            return response()->json([
                'order' => $order,
                'success' => true,
            ]);
        }
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
