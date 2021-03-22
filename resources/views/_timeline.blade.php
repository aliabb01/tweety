<div class="border border-gray-300 rounded-lg">
    @forelse ($tweets as $tweet)
        @include('_tweet')

    @empty
    <p class="p-4">No tweets yet.</p>
    @endforelse

    {{-- In mine (laravel 8) there was no actual need to 
        pubish vendor to edit the pagination.
        There already was styled pagination. 
        Below is the code that enables pagination.
        This alone however, can cause error. 
        To fix go to timeline() in User model and 
        paginate it too--}}

    {{ $tweets->links() }}

</div>