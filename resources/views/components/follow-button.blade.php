{{--  @if(auth()->user()->isNot($user)) This and below are basically the same things--}}
{{-- current_user() is basically a helper function that is equal to auth()->user() --}}
@unless (current_user()->is($user))

{{-- action="/profiles/{{ $user->username }}/follow"      used below commented out in (65)--}}
<form method="POST" action="{{ route('follow', $user->username) }}">
    @csrf

    <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs">
        {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}</button>
</form>

@endunless
{{-- @endif --}}