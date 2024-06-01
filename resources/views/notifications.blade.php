<x-app>
    <div class="notification-container">
        @if ($notifications->isNotEmpty())
            <ul id="notification-list">
                @foreach ($notifications as $notification)
                    @if ($notification['type'] == 'follow')
                        <li class="notification-item">
                            <div class="card-body">
                                <div class="flex items-center mb-2">
                                    <img src="{{ $notification['user']->avatar }}" alt="{{ $notification['user']->name }}'s Avatar" class="rounded-full mr-2" width="40" height="40">
                                    <h5 class="card-title"><b>{{ $notification['user']->name }}</b> mulai mengikuti Anda.</h5>
                                    @unless ($notification['user']->isFollowedBy(auth()->user()))
                                        <form action="{{ route('followback', $notification['user']->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="rounded-full border border-blue-500 bg-blue-500 text-white py-1 px-3 text-xs ml-auto">
                                                Ikuti Balik
                                            </button>
                                        </form>
                                    @endunless
                                </div>
                            </div>
                        </li>
                    @elseif ($notification['type'] == 'like')
                        <li class="notification-item">
                            <div class="card-body mb-4">
                                <div class="flex items-center mb-2">
                                    <img src="{{ $notification['user']->avatar }}" alt="{{ $notification['user']->name }}'s Avatar" class="rounded-full mr-2" width="40" height="40" style="margin-top: 8px;">
                                    <h5 class="card-title"><b>{{ $notification['user']->name }}</b> menyukai postingan Anda: {{ $notification['tweet']->body }}"</h5>
                                </div>
                                @if ($notification['tweet']->image)
                                    <img src="{{ asset('images/' . $notification['tweet']->image) }}" alt="Tweet Image" class="mt-2 rounded-lg" style="max-width: 100%; width: 300px;">
                                @endif
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>Empty Notifications</p>
        @endif
    </div>
</x-app>
