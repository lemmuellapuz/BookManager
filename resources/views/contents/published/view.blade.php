@extends('layouts.app')

@section('contents')

<div class="container">

    <div class="mt-5">

        
        <h3>{{ $book->title }}</h3>
        <small>by: {{ $book->user->name }}</small>

        <hr/>

        <p>{{ $book->content }}</p>

        <hr>
        <a href="{{ route('published-books.index') }}" class="btn btn-primary">Back</a>
        
       
    </div>

</div>

@endsection