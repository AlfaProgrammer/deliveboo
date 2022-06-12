@extends('layouts.app')

@section('content')

<div class="background-orders">
    
        <div class="">
            <h1>Ordini</h1>

            <div class="main-wrap container"> 
                @foreach ($orders as $order)
                    <div class="card-order">

                        <div class="info-order">
                            <h3>
                                {{$order->name}} {{$order->surname}}
                            </h3>
                            <span>N°{{$order->id}}</span>
                        </div>

                        <div>
                            <h4 class="my-3">Indirizzo</h4>
                            <span>{{$order->cap}}</span>
                            <span>{{$order->address}}</span>
                            <span>{{$order->house_number}} - {{$order->city}}</span>

                            <h4 class="my-3">Info User</h4>
                            <div>Email: {{$order->email}}</div>
                            <div>Numero di telefono: {{$order->phone_number}}</div>
                        </div>

                        <div>
                            <h4>Piatti Ordinati</h4>
                            @foreach ($order->plates as $plate)
                                <div class="order-plates">
                                    <span>{{$plate->name}} - {{$plate->price}}€</span>
                                    <span>x{{$plate->pivot->quantity}}</span>
                                </div>
                            @endforeach
                            <h4>Prezzo Totale: {{$order->total_price}}€</h4>
                        </div>

                    </div>
                @endforeach

                    {{-- <div class="arrow">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div> --}}

            </div>

        </div>
        
    </div>
@endsection