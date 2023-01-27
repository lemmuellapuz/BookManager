@extends('layouts.app')

@section('contents')

<div class="container">

    <div class="mt-5">

        <h2 class="mb-3">Sign in</h2>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('sign-in') }}" method="POST">

            @csrf

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                <label for="email">Email address<span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password<span class="text-danger">*</span></label>
            </div>
            
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" value="true">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            @include('components.form_errors')

            <input type="submit" value="Sign in" class="btn btn-primary">

        </form>

        
    </div>

</div>

@endsection