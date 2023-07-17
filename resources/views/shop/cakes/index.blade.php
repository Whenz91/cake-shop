@extends('layouts.shop')
 
@section('title', 'Categories')

@section('content')
    <h1 class="mb-5">Cake Categories</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @isset($categories)

    <x-categories-tab :categories=$categories />
 
    @endisset

    @empty($categories)
    <div class="text-center">
        <p>Looks like we don't have any cakes yet.</p>
    </div>
    @endempty
@endsection