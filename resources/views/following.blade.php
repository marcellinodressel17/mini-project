<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('following') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <div class="mb-5">
                            <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        </div>
                        <div>
                            @forelse ($following as $follow)
                                <a href="{{ $follow->path() }}" class="flex items-center mb-5">
                                    <img src="{{ $follow->avatar }}"
                                         alt="{{ $follow->username }}'s avatar"
                                         width="60"
                                         class="mr-4 rounded">
                                    <div>
                                        <h4 class="font-bold">{{ '@' . $follow->username }}</h4>
                                    </div>
                                </a>
                            @empty
                                <p>{{ $user->name }} is not following anyone yet.</p>
                            @endforelse
                            {{ $following->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
