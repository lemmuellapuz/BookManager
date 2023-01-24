@extends('layouts.app')

@section('contents')

<div class="container">

    <form class="mt-5" action="{{ route('books.update', ['book' => $book]) }}" method="POST">

        @csrf
        @method('PUT')

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <div class="form-floating mb-3">
            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ $book->title }}">
            <label for="title">Title</label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" id="content" name="content" placeholder="Content" class="form-control" value="{{ $book->content }}">
            <label for="content">Content</label>
        </div>

        @include('components.form_errors')

        <input type="submit" value="Save changes" class="btn btn-success">

    </form>

</div>

@endsection