<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweet" enctype="multipart/form-data">
        @csrf

        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc?"
            style="border-radius: 20px"
            required
            autofocus
        ></textarea>

        <input type="file" name="image" accept="image/*"> 

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ $user->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >

            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Publish
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
