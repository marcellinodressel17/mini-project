<x-app>
    <div>
        @if ($bookmarkedTweets)
            @foreach ($bookmarkedTweets as $tweet)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="flex items-center mb-2">
                            <img src="{{ $tweet->user->avatar }}" alt="{{ $tweet->user->name }}'s Avatar" class="rounded-full mr-2" width="40" height="40">
                            <h5 class="card-title">{{ $tweet->user->name }}</h5>
                        </div>
                        <p class="card-text">{{ $tweet->body }}</p>
                        @if ($tweet->image)
                            <img src="{{ asset('images/' . $tweet->image) }}" alt="Tweet Image" class="mt-2 rounded-lg" style="max-width: 100%; width: 300px;">
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada tweet yang dibookmark.</p>
        @endif
    </div>
</x-app>
