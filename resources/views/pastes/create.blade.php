@extends('template')

@section('title', 'Create paste')

@section('styles')
    <link href="{{ asset('css/paste.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form method="POST" action="{{ route('paste.store') }}">
        @csrf

        <textarea class="form-control-plaintext bg-light" wrap="off" aria-required="true" name="paste"></textarea>

        <div class="my-2">
            <div class="input-group form-group col-md-4">
                <label class="input-group-addon" for="syntax">Syntax Highlighting</label>
                <input class="form-control" type="text" name="syntax" id="syntax">
            </div>

            <div class="input-group form-group col-md-4 my-2">
                <label class="input-group-addon" for="expiredAt">Paste Expiration</label>
                <select class="form-control" aria-label="Paste Expiration" id="expiredAt" name="expiredAt">
                    <option value="10MIN">10 minutes</option>
                    <option value="1H">1 hour</option>
                    <option value="3H">3 hours</option>
                    <option value="1D">1 day</option>
                    <option value="1W">1 week</option>
                    <option value="1M">1 month</option>
                    <option value="N">Never</option>
                </select>
            </div>

            <div class="input-group form-group col-md-4">
                <label class="input-group-addon" for="exposure">Paste Exposure</label>
                <select class="form-control" aria-label="Paste Expiration" id="exposure" name="accessType">
                    <option value="public">Public</option>
                    <option value="unlisted">Unlisted</option>
                    @if(Auth::check())
                        <option value="private">Private</option>
                    @endif
                </select>
            </div>

            <div class="input-group">
                <button class="btn btn-primary form-control my-2" type="submit">Create New Paste</button>
            </div>
        </div>
    </form>
@endsection
