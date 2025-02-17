<div class="flex">
    <form method="POST"
          action="/tweets/{{ $tweet->id }}/like">
        @csrf

        <div class="flex items-center mr-2 {{ $tweet->isLikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
            <svg viewBox="0 0 20 20" class="mr-1 w-3">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g class="fill-current">
                        <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                    </g>
                </g>
            </svg>

            <button type="submit" class="text-xs">
                {{ $tweet->likes ?: 0 }}
            </button>
        </div>
    </form>

    <form method="POST"
          action="/tweets/{{ $tweet->id }}/like">
        @csrf
        @method('DELETE')

        <div class="flex items-center {{ $tweet->isDislikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
            <svg viewBox="0 0 20 20" class="mr-1 w-3">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g class="fill-current">
                        <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z" id="Fill-97"></path>
                    </g>
                </g>
            </svg>

            <button type="submit" class="text-xs">
                {{ $tweet->dislikes ?: 0 }}
            </button>
        </div>
    </form>

    <form method="POST" action="/tweets/{{ $tweet->id }}/bookmark">
        @csrf

        <div class="flex items-center ml-4 {{ $tweet->isBookmarkedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 w-4 h-4 fill-current" viewBox="0 0 24 24">
                @if ($tweet->isBookmarkedBy(auth()->user()))
                    <path d="M5 1h14a2 2 0 0 1 2 2v18l-7-3-7 3V3a2 2 0 0 1 2-2z"/>
                @else
                    <path d="M4 1v22l8-3 8 3V1H4zm12 16l-4-3-4 3V3h8v14z"/>
                @endif
            </svg>
            <button type="submit" class="text-xs">
                {{ $tweet->bookmark_count ?: 0 }}
            </button>
        </div>
    </form>
</div>
