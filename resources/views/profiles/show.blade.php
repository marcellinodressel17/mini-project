<x-app>
    <header class="mb-6 relative">
    
  <div class="relative">
            <img src="{{ $user->getBgImage() }}"
                  alt=""
                  width="700px"
                  height="223px"
                  class="mb-2"
                  style="border-radius: 20px"
            >

            <img src="{{ asset('images/' . $user->avatar) }}"
                 alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50%"
                 width="150"
            >
        </div>
        <div class="flex justify-between items-center mb-6">
            
          <div style="max-width: 270px">
          	                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
          </div>
          <div class="flex items-center space-x-4">
          <div class="text-center">
    <a href="{{ route('following', $user) }}">
        <h3 class="font-bold text-lg">
            <span class="block text-sm">Following</span>
            <span>{{ $user->follows()->count() }}</span>
        </h3>
    </a>
</div>
<a href="{{ route('followers', $user) }}" class="text-center">
    <h3 class="font-bold text-lg">
        <span class="block text-sm">Followers</span>
        <span>{{ $user->followers()->count() }}</span>
    </h3>
</a>
</div>
				<div class="flex"> 
					@can('edit',$user)
					<a href="{{ $user->path('edit')}}">
                    <button type="submit" class="rounded-full border border-blue-500 bg-blue-500 text-white py-2 px-4 text-xs mr-2">
    Edit Profile
</button>
                   </a>
					@endcan
                   <x-follow-button :user="$user">
                   </x-follow-button>
               </div>
        </div>
        <p class="text-sm">
            The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>


    </header>
    
    @include('_timeline', [
        'tweets' =>$tweets
    ])
</x-app>