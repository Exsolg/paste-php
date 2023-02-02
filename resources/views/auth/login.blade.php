@extends('template')

@section('title', 'Paste')

@section('styles')
    <link href="{{ asset('css/paste.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form class="w-25 mx-auto" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label" for="email">Email</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" />
            <label class="form-label" for="password">Password</label>
        </div>

        <div class="row mb-4">
            <div class="col d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked />
                    <label class="form-check-label" for="remember"> Remember me </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4 w-50">Sign in</button>
            </div>
        </div>
    </form>
@endsection

