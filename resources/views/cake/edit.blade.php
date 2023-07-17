@extends('layouts.app')
 
@section('title', 'Edit Cake')

@section('content')
    <h1>Edit Cake</h1>

    <form method="POST" action="{{ route('cakes.update', $cake) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Cake Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cake->name) }}">
            @error('name')
                <div class="invalid-feedback @error('name') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Cake Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="3">{{ old('description', $cake->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback @error('description') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cake Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $cake->price) }}">
            @error('price')
                <div class="invalid-feedback @error('price') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Cake Category</label>
            <select class="form-select" aria-label="Default select example" id="category" name="category">
                <option>Please select one category</option>
                @foreach ($categories_for_select as $category)
                <option value="{{ $category->id }}" @if ($cake->categories[0]->id == $category->id) selected @endif >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="invalid-feedback @error('category') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Cake Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('cakes.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection