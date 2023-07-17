@extends('layouts.app')
 
@section('title', 'Chefs')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>Chefs</h1>
        <a href="{{ route('chefs.create') }}" class="btn btn-secondary">Create New</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @isset($chefs)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Chef Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chefs as $chef)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $chef->name }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="{{ route('chefs.edit', $chef) }}" class="btn btn-secondary">Edit</a>
                        <form method="POST" action="{{ route('chefs.destroy', $chef) }}">
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