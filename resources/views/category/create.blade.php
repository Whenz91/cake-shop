@extends('layouts.app')
 
@section('title', 'Create Category')

@section('content')
    <h1>Create Category</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <div class="invalid-feedback @error('name') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_highlighted" name="is_highlighted" value="1">
            <label class="form-check-label" for="is_highlighted">
                Highlight category
            </label>
            @error('is_highlighted')
                <div class="invalid-feedback @error('is_highlighted') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection