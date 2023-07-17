@extends('layouts.app')
 
@section('title', 'Create Cake')

@section('content')
    <h1>Create Cake</h1>

    <form method="POST" action="{{ route('cakes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Cake Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <div class="invalid-feedback @error('name') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Cake Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
            @error('description')
                <div class="invalid-feedback @error('description') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cake Price</label>
            <input type="number" class="form-control" id="price" name="price">
            @error('price')
                <div class="invalid-feedback @error('price') d-block @enderror">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Cake Category</label>
            <select class="form-select" aria-label="Default select example" id="category" name="category">
                <option selected>Please select one category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
    </form>
@endsection