<x-app>
    <div>
        @foreach ($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center mb-5">
            <img class="mr-4" src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" width="60">

            <div class="">
                <h4 class="font-bold">{{ '@' . $user->username }}</h4>
            </div>
        </a>

        
        @endforeach

        {{ $users->links() }}
    </div>
</x-app>