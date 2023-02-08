@extends('template')

@section('title', 'Paste')

@section('styles')
    <link href="{{ asset('css/paste.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if(count($pastes))
        <h2 class="text-center my-5">Pastes</h2>
        <div class="float-end">
            <a class="text-decoration-none" href="{{ route('pastes.list', ['pageSize' => 5]) }}">
                <span class="btn btn-primary">5</span>
            </a>
            <a class="text-decoration-none" href="{{ route('pastes.list', ['pageSize' => 10]) }}">
                <span class="btn btn-primary">10</span>
            </a>
            <a class="text-decoration-none" href="{{ route('pastes.list', ['pageSize' => 20]) }}">
                <span class="btn btn-primary">20</span>
            </a>
        </div>
        @foreach($pastes as $paste)
            <div class="my-3">
                <span>@if(!$paste->user_id) Guest @else {{ $paste->user->name }} @endif</span>
                <span>Syntax: @if(!$paste->syntax) Text @else {{ $paste->syntax }} @endif</span>
                <span>Created at {{ $paste->created_at }}</span>
                @if($paste->expired_at) <span>Expired at {{ $paste->expired_at }}</span> @endif

                <textarea id="paste" class="form-control-plaintext bg-light" wrap="soft" readonly>{{ $paste->paste }}</textarea>
                <label for="paste"></label>
            </div>
        @endforeach
        <div>{{ $pastes->links()}}</div>
    @else
        <h2 class="text-center">Pastes not found</h2>
    @endif
@endsection
