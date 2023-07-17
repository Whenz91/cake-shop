@extends('layouts.app')
 
@section('title', 'Orders')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-secondary">Create New</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @isset($orders)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Created At</th>
                <th scope="col">Contact infos</th>
                <th scope="col">Shipping At</th>
                <th scope="col">Cake Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $order->created_at }}</td>
                <td>
                    {{ $order->name }} <br>
                    <small>{{ $order->phone }}</small> <br>
                    <small>{{ $order->email }}</small>
                </td>
                <td>{{ $order->shipping_at }}</td>
                <td>{{ $order->cake->name }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">See More</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-secondary">Edit</a>
                        <form method="POST" action="{{ route('orders.destroy', $order) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endisset
@endsection