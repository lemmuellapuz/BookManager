@extends('layouts.app')

@section('contents')

<div class="container">

    <div class="mt-5">

        <h2 class="mb-3">Sign Up</h2>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('sign-up') }}" method="POST">

            @csrf

            <div class="form-floating mb-3">
                <select name="type" id="type" class="form-control" required>
                    <option value="Reader">Reader</option>
                    <option value="Author">Author</option>
                </select>
                <label for="type">Type<span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="{{ old('fullname') }}" required>
                <label for="fullname">Fulname<span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                <label for="email">Email address<span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password<span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password-confirmation" name="password_confirmation" placeholder="Confirm Password">
                <label for="password-confirmation">Confirm Password<span class="text-danger">*</span></label>
            </div>

            @include('components.form_errors')

            <input type="submit" value="Sign up" class="btn btn-primary">

        </form>

        
    </div>

</div>

@endsection