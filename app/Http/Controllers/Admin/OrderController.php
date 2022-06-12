<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $restaurant = $user->restaurant;
        $plates = $restaurant->plates;
        //$plates->load('orders');
        $orders = Order::with('plates')->whereHas('plates', function($q) use ($plates) {
            $q->whereIn('order_plate.plate_id', $plates);
        })->orderBy('created_at', 'desc')
            ->get();
        /* dd($plates); */

        /* $orders = $plates[0]->orders; */
    
        //dd($orders);
        return view('admin.orders.index', compact('plates', 'orders'));
    }
}
