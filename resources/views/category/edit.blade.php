@extends('layouts.app')
 
@section('title', 'Edit Category')

@section('content')
    <h1>Edit Category</h1>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback @error('name') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_highlighted" name="is_highlighted" value="1" @if($category->is_highlighted) checked @endif>
            <label class="form-check-label" for="is_highlighted">
                Highlight category
            </label>
            @error('is_highlighted')
                <div class="invalid-feedback @error('is_highlighted') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection