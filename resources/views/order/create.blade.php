@extends('layouts.app')
 
@section('title', 'Create Order')

@section('content')
    <h1>Create Order</h1>

    <form method="POST" action="{{ route('orders.store') }}">
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

        <div class="mb-3">
            <label for="cake_id" class="form-label">Cake Type</label>
            <select class="form-select" id="cake_id" name="cake_id">
                <option selected>Please select one cake</option>
                @foreach ($cakes as $cake)
                <option value="{{ $cake->id }}">{{ $cake->name }}</option>
                @endforeach
            </select>
            @error('cake_id')
                <div class="invalid-feedback @error('cake_id') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Order</button>
    </form>
@endsection