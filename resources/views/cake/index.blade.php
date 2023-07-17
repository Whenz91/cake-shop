@extends('layouts.app')
 
@section('title', 'Cakes')

@section('content')
    <h1>Cakes</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @isset($cakes)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cakes as $cake)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ asset('images/cakes/' . $cake->image) }}" alt="{{ $cake->name }}" class="img-thumbnail" width="100px"></td>
                <td>{{ $cake->name }}</td>
                <td>{{ $cake->price }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="{{ route('cakes.edit', $cake) }}" class="btn btn-success">Edit</a>
                        <form method="POST" action="{{ route('cakes.destroy', $cake) }}">
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

    @empty($cakes)
    <div class="text-center">
        <p>You have not created any cake yet.</p>
        <a href="{{ route('cakes.create') }}" class="btn btn-primary">Let's create one!</a>
    </div>
    @endempty
@endsection