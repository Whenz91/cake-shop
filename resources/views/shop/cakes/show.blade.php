@extends('layouts.shop')
 
@section('title', 'Cake')

@section('content')
    <div class="mt-3">
        <a href="{{ route('shop.cakes.index') }}" class="link-secondary link-underline link-underline-opacity-0">&larr; Back</a>
    </div>
    <div class="row mt-3">
        <div class="col col-md-6">
            <img src="{{ asset('images/cakes/' . $cake->image) }}" alt="{{ $cake->name }}" class="img-fluid">
        </div>
        <div class="col col-md-6">
            <h1 class="mb-3">{{ $cake->name }}</h1>
            <p class="lead mb-5">{{ $cake->price }} $</p>
            <p>{{ $cake->description }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">
            Make Order
            </button>
        </div>
    </div>
    
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="orderModalLabel">Order Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('shop.cakes.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback @error('name') d-block @enderror">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback @error('phone') d-block @enderror">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback @error('email') d-block @enderror">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-4">
                                <label for="zipcode" class="form-label">Zip Code</label>
                                <input type="number" class="form-control" id="zipcode" name="zipcode" value="{{ old('zipcode') }}">
                                @error('zipcode')
                                    <div class="invalid-feedback @error('zipcode') d-block @enderror">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-8">
                            <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                                @error('city')
                                    <div class="invalid-feedback @error('city') d-block @enderror">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback @error('address') d-block @enderror">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="shipping_at" class="form-label">Shipping At</label>
                            <input type="datetime-local" id="shipping_at" name="shipping_at" class="form-control js-date-time-input">
                            @error('shipping_at')
                                <div class="invalid-feedback @error('shipping_at') d-block @enderror">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback @error('comment') d-block @enderror">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="cake_id" id="cake_id" value="{{ $cake->id }}">

                        <button type="submit" class="btn btn-primary">Send Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection