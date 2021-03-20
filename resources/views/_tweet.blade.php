<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-grey-400' }}">
    <div class="mr-2 flex-shrink-0">

        {{-- {{ route('profile', $tweet->user  /*can write "->name" here  (60)*/) }} --}} 
        <a href="{{ $tweet->user->path() }}">    {{-- return the profile path (62) --}}
            <img src="{{ $tweet->user->avatar }}" class="rounded-full mr-2" width="50" height="50" alt="">
        </a>
    </div>

    <div class="">
        <h5 class="font-bold mb-4">

            {{-- {{ route('profile', $tweet->user) }} --}}
            <a href="{{ $tweet->user->path() }}">
                {{ $tweet->user->name }}
            </a>
        </h5>

        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>