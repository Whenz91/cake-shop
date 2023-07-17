@extends('layouts.app')
 
@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @isset($categores)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categores as $category)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $category) }}">
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

    @empty($categores)
    <div class="text-center">
        <p>You have not created any categories yet.</p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Let's create one!</a>
    </div>
    @endempty
@endsection