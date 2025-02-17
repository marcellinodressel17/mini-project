<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}"
                alt="kosong"
                class="rounded-full mr-2"
                width="50"
                height="50">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ route('profile', $tweet->user) }}">
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-sm"> 
            {{ $tweet->body }}
        </p>
        @if ($tweet->image)
    <img src="{{ asset('images/' . $tweet->image) }}" alt="Tweet Image" class="mt-2 rounded-lg mb-4" style="max-width: 100%; width: 300px;">
@endif
 @auth
            <x-like-buttons :tweet="$tweet" />
        @endauth
    </div>   
</div>
