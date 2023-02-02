@extends('template')

@section('title', 'Registration')

@section('content')
    <form class="w-25 mx-auto" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-outline mb-4">
            <input id="name" name="name" class="form-control" />
            <label class="form-label" for="name">Name</label>
        </div>

        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label" for="email">Email</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" />
            <label class="form-label" for="password">Password</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
            <label class="form-label" for="password_confirmation">Confirm password</label>
        </div>

        <div class="row mb-4">
            <div class="col d-flex justify-content-between">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit" class="btn btn-primary btn-block mb-4 w-50">Sign in</button>
            </div>
        </div>
    </form>
@endsection
