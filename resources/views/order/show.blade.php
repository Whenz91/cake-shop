@extends('layouts.app')
 
@section('title', 'Order')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>#{{ $order->id }} Order</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Orderer name: {{ $order->name }}</li>
                <li class="list-group-item">Contact phone: {{ $order->phone }}</li>
                <li class="list-group-item">Contact email: {{ $order->email }}</li>
                <li class="list-group-item">Shipping Address: {{ $order->zipcode }} {{ $order->city }}, {{ $order->address }}</li>
                <li class="list-group-item">Shipping at: {{ $order->shipping_at }}</li>
                <li class="list-group-item">Comment: {{ $order->comment }}</li>
            </ul>
        </div>
        <div class="col-12 col-md-6">
            <div class="card mx-auto" style="width: 18rem;">
                <img src="{{ asset('images/cakes/' . $order->cake->image) }}" class="card-img-top" alt="{{ $order->cake->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $order->cake->name }}</h5>
                    <p class="lead">{{ $order->cake->price }} $</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('generate-invoice', ['id' => $order->id]) }}" class="btn btn-success">Make Invoice</a>
    
@endsection