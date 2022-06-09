@extends('layouts.app')

@section('content')
<div>

    <div class="container"> 
        <h1>Ordine</h1>
        @foreach ($orders as $order)
            <h3>
                {{$order->name}}<br/>
                {{$order->id}}
            </h3>
            @foreach ($order->plates as $plate)
                <div>
                    {{$plate->name}}  
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection