@isset($lastPastes)
    @if(count($lastPastes))
        <h2 class="text-center my-2">Last pastes</h2>
    @endif
    @foreach($lastPastes as $paste)
        <div class="my-3">
            <span>{{ $loop->index + 1 }}.
                @if(!$paste->user_id)
                    Guest:
                @else
                    {{ $paste->user->name }}:
                @endif
                <a class="text-decoration-none" href="{{ route('paste.getByHash', [$paste->hash]) }}">{{ substr($paste->paste, 0, 25) }}</a>
            </span>
        </div>
    @endforeach
@endisset
