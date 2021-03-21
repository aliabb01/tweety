
@auth
    

<div class="bg-gray-200 rounded-lg py-5 px-6">

    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (auth()->user()->follows as $user)


        <li class="mb-4">
            <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                
                <img src="{{ $user->avatar }}" class="rounded-full mr-2" width="40" height="40" alt="">
                
                {{ $user->name }}
                
            </a>
        </li>

        @empty
        <li>No friends yet!</li>

        @endforelse
    </ul>

</div>

@endauth