<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\SendOrderCompleteMail;
use App\Mail\SendOrderRestaurantMail;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'p7sgyb9mzr7b4s33',
            'publicKey' => 'kf2gbnxvdwbg89wy',
            'privateKey' => '1fbb2c0ac805e539785e3314d6a3d91a'
        ]);

        // pass $clientToken to your front-end
        $clientToken = $gateway->clientToken()->generate([
        ]);

        return response()->json([
            'token' => $clientToken,
            'succes' => true
        ]);
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
        $data = $request->all();

        $order = $data['order'];

        $restaurantSlug = $data['restaurant'];

        //return $restaurantSlug;

        $restaurant = Restaurant::with('user')
            ->where('slug', $restaurantSlug)
            ->first();

        $user = $restaurant->user;

        $userEmail = $restaurant->user->email;

        //return $user;

        $tokenNonce = $request->query('token');
        $total = $data['total'];
        //return $total;

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'p7sgyb9mzr7b4s33',
            'publicKey' => 'kf2gbnxvdwbg89wy',
            'privateKey' => '1fbb2c0ac805e539785e3314d6a3d91a'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $tokenNonce,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        Mail::to($order['email'])->send(new SendOrderCompleteMail($order));

        Mail::to($userEmail)->send(new SendOrderRestaurantMail($user));

        if ($result->success) {
            // See $result->transaction for details
            return $result->transaction;
        } else {
            return $result->transaction;
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
