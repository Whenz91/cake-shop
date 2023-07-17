@extends('layouts.app')
 
@section('title', 'Create Review')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>Create Review</h1>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback @error('name') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback @error('email') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="review_rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="review_rating" name="review_rating" value="{{ old('review_rating') }}" min="1" max="5">
            @error('review_rating')
                <div class="invalid-feedback @error('review_rating') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="review_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="review_title" name="review_title" value="{{ old('review_title') }}">
            @error('review_title')
                <div class="invalid-feedback @error('review_title') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="review_text" class="form-label">Review</label>
            <textarea class="form-control" id="review_text" name="review_text" rows="3">{{ old('review_text') }}</textarea>
            @error('review_text')
                <div class="invalid-feedback @error('review_text') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Review Image</label>
            <input class="form-control" type="file" id="image" name="image">
            @error('image')
                <div class="invalid-feedback @error('image') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="approved" name="approved" value="1">
            <label class="form-check-label" for="approved">
                Approved
            </label>
            @error('approved')
                <div class="invalid-feedback @error('approved') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cake_id" class="form-label">Cake</label>
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

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection