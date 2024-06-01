<ul>
<div class="bg-gray-200 border border-gray-300 rounded-lg py-6 px-2">
    <li>
        <a href="{{route('home')}}" class="font-bold text-lg mb-4 block">
            Home
        </a>
    </li>
    <li>
        <a href="/explore" class="font-bold text-lg mb-4 block">
            Explore
        </a>
    </li>
    <li>
        <a href="/notifications" class="font-bold text-lg mb-4 block">
            Notifications
        </a>
    </li>
    <li>
        <a href="/bookmarks" class="font-bold text-lg mb-4 block">
            Bookmarks
        </a>
    </li>
    <li>
        <a href="{{route('profile', auth()->user())}}" class="font-bold text-lg mb-4 block">
            Profile
        </a>
    </li>
    <li>
        <form method="POST" action="/logout">
            @csrf

            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>