<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.charts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $TotalOrderForMonths = [];
        $totalSellForMonths = [];

        $restaurant = $user->restaurant;
        $plates = $restaurant->plates;

        for($i = 1; $i <= 12; $i++) {
            
            $orders = Order::with('plates')
                ->whereMonth('created_at', $i)
                ->whereHas('plates', function($q) use ($plates) {
                    $q->whereIn('order_plate.plate_id', $plates);
                })
                ->orderBy('created_at', 'desc')
                ->get();

            $totalOrder = $orders->count();

            $sum = 0;

            foreach($orders as $order) {

                $sum += $order->total_price;
            }

            array_push($TotalOrderForMonths, $totalOrder);
            array_push($totalSellForMonths, number_format($sum, 2, '.', ''));

        }

        //dd($TotalOrderForMonths);
        
        return response()->json([
            'totalOrdersForMonths' => $TotalOrderForMonths,
            'totalSellForMonths' => $totalSellForMonths,
            'success' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
