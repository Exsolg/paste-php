@extends('template')

@section('title', 'Paste')

@section('styles')
    <link href="{{ asset('css/paste.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div>
        <span>@if(!Auth::check()) Guest @else {{ $paste->user->name }} @endif</span>
        <span>Syntax: @if(!$paste->syntax) Text @else {{ $paste->syntax }} @endif</span>
        <span>Created at {{ $paste->created_at }}</span>
        @if($paste->expired_at) <span>Expired at {{ $paste->expired_at }}</span> @endif

        <textarea class="form-control-plaintext bg-light" wrap="off" readonly>{{ $paste->paste }}</textarea>
    </div>
@endsection
