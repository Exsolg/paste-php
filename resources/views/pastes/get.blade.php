@extends('template')

@section('title', 'Paste')

@section('styles')
    <link href="{{ asset('css/paste.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div>
        <span>@if(!$paste->user_id) Guest @else {{ $paste->user->name }} @endif</span>
        <span>Syntax: @if(!$paste->syntax) Text @else {{ $paste->syntax }} @endif</span>
        <span>Created at {{ $paste->created_at }}</span>
        @if($paste->expired_at) <span>Expired at {{ $paste->expired_at }}</span> @endif

        <textarea id="paste" class="form-control-plaintext bg-light" wrap="soft" readonly>{{ $paste->paste }}</textarea>
        <label for="paste"></label>
    </div>
@endsection
