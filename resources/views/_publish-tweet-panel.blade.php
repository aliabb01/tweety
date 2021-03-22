<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        
        <textarea name="body" class="w-full" placeholder="What's up doc?" required autofocus></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" class="rounded-full mr-2" width="50" height="50" alt="your avatar">

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-full shadow py-2 px-10 text-white text-sm" style="height:40px;">Publish</button>
        </footer>

        
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>




