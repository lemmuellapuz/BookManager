@extends('layouts.app')

@section('contents')

<div class="container">

    <div class="mt-5">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">Add Book</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-success m-1">Edit</a>
                                
                                <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST">

                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>

                                </form>
                                
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No data to show</p>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection