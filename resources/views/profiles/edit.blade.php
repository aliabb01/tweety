<x-app>
    <form method="post" action="{{ $user->path() }}" enctype="multipart/form-data">
        <!-- enctype is for file uploads in a form -->
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input name="name" id="name" type="text" class="border border-gray-400 p-2 w-full" value="{{ $user->name }}"
                required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Username
            </label>

            <input name="username" id="username" type="text" class="border border-gray-400 p-2 w-full"
                value="{{ $user->username }}" required>

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Avatar
            </label>

            <div class="flex">
                <input name="avatar" id="avatar" type="file" class="border border-gray-400 p-2 w-full"
                    value="{{ $user->username }}">

                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" width="40">

            </div>

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input name="email" id="email" type="email" class="border border-gray-400 p-2 w-full"
                value="{{ $user->email }}" required>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input name="password" id="password" type="password" class="border border-gray-400 p-2 w-full" required>

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password Confirmation
            </label>

            <input name="password_confirmation" id="password_confirmation" type="password"
                class="border border-gray-400 p-2 w-full" required>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                Submit
            </button>

            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>

    </form>
</x-app>