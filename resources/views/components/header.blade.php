<header class="relative flex w-full justify-between px-2 sm:px-4 md:px-20 lg:px-20 z-50 bg-white border-b-gray-200 border mb-1">
    <div class="flex">
        <div>
            <a href="/">
                <img src="{{asset('images/logo.png')}}" height="80px" width="120px" />
            </a>
        </div>
        <a class="ml-3 flex items-center" href="/posts/search">
            <div class="flex">
                <p>Search</p> 
                <div class="flex items-center justify-center">
                    <x-css-search class="w-4 h-4"/>
                </div>
            </div>
        </a>
        <div class="ml-4 flex items-center">
            <p class="hover:cursor-pointer" data-open="false" onclick="exploreDropDown(this)">Explore</p>
        </div>
    </div>
    @if (Route::has('login'))
        <div class="sm:flex items-center hidden">
            <div class="flex items-center">
                    @auth
                        <x-profile-dropdown></x-profile-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="p-2 bg-blue-500 text-white rounded">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 p-2 border-2 rounded">Register</a>
                        @endif
                    @endauth
                </div>
        </div>
    @endif
    <button class="block sm:hidden mr-5 text-2xl" onclick="toggleMenu(this)">
        ☰
    </button>
</header>
<x-menu></x-menu>
<x-explore.dropdown-mb></x-explore.dropdown-mb>
<x-explore.dropdown></x-explore.dropdown>
<script src="{{ asset('js/header/index.js') }}"></script>



