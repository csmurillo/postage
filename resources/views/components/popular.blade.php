<div class="px-4 sm:px-4 md:px-20 lg:px-20 py-20">
    <h1 class="text-3xl mb-4">Popular</h1>
    {{-- <div class="md:flex md:gap-4"> --}}
    <div class="lg:grid-cols-3 lg:gap-4 sm:grid md:grid-cols-2 md:gap-4">
        <div class="relative flex flex-col mb-4 md:flex-1 max-h-[17.5rem] cursor-pointer group"  onclick="window.location.href='/posts/search?search=dogecoin'">
            <div class="h-[80%]">
                <img class="max-h-[17.5rem] w-full" src="{{asset('images/dogecoin.jpg')}}"/>
                {{-- https://unsplash.com/photos/zblzjbnJa8k?utm_source=unsplash&utm_medium=referral&utm_content=creditShareLink --}}
            </div>
            <h2 class="flex flex-grow absolute bottom-0 p-4 text-white text-xl group-hover:underline">Crypto</h2>
        </div>
        <div class="relative flex flex-col mb-4 md:flex-1 max-h-[17.5rem] cursor-pointer group" onclick="window.location.href='/posts/search?search=programming+languages'">
            <div class="h-[80%]">
                <img class="max-h-[17.5rem] w-full" src="{{asset('images/languages.jpg')}}"/>
                {{-- https://unsplash.com/photos/zblzjbnJa8k?utm_source=unsplash&utm_medium=referral&utm_content=creditShareLink --}}
            </div>
            <h2 class="flex flex-grow absolute bottom-0 right-0 p-4 text-white text-xl md:left-0 md:right-auto group-hover:underline">Languages</h2>
        </div>
        <div class="relative flex flex-col mb-4 md:flex-1 max-h-[17.5rem] cursor-pointer group"  onclick="window.location.href='/posts/search?search=hardware'">
            <div class="h-[80%]">
                <img class="max-h-[17.5rem] w-full" src="{{asset('images/hardware.jpg')}}"/>
            </div>
            <h2 class="flex flex-grow absolute bottom-0 p-4 text-white text-xl group-hover:underline">Hardware</h2>
        </div>
    </div>
</div>