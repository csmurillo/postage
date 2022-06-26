<header class="relative flex w-full justify-between md:px-10 sm:px-40 z-50 bg-white">
    <div class="flex">
        <div>
            <a href="/">
                <img src="{{asset('images/logo.png')}}" height="80px" width="120px" />
            </a>
        </div>
        <div class="flex items-center">
            <p class="hover:cursor-pointer" data-open="false" onclick="exploreDropDown(this)">Explore</p>
        </div>
    </div>
    <div class="sm:flex items-center hidden">
        {{-- right --}}
        @if (Route::has('login'))
        <div class="flex items-center">
                @auth
                    <x-profile-dropdown></x-profile-dropdown>
                    {{-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        {{Auth::user()->username}}
                    </a> --}}
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <button class="block sm:hidden mr-5 text-2xl" onclick="toggleMenu(this)">
        ☰
    </button>
</header>
<x-menu></x-menu>
<x-explore.dropdown-mb></x-explore.dropdown-mb>
<x-explore.dropdown></x-explore.dropdown>
<script>
    function toggleMenu(btn){
        const header = document.body.getElementsByTagName('header');
        const menu = document.getElementById('menu');

        // on open
        if(menu.classList.contains('hidden')){
            btn.innerHTML='×';
            btn.classList.remove('text-2xl');
            btn.classList.add('text-4xl');
            menu.classList.remove('hidden');
            menu.classList.add('block');
            document.body.style.overflowY = "hidden";
        }
        // on close
        else{
            btn.innerHTML='☰';
            btn.classList.remove('text-4xl');
            btn.classList.add('text-2xl');
            menu.classList.remove('block');
            menu.classList.add('hidden');
            document.body.style.overflowY = "unset";
        }
    }
    function exploreDropDown(div) {
        const exploreDropDownMb = document.getElementById('explore-dropdown-mb');
        const exploreDropDown = document.getElementById('explore-dropdown');

        // toggle logic
        if((div.dataset.open=="false")){
            div.dataset.open='true';
            exploreDropDownMb.style.marginTop="120px";
            exploreDropDownMb.classList.remove('hidden');
            exploreDropDownMb.classList.add('block');
            exploreDropDown.style.marginTop="120px";
            exploreDropDown.classList.remove('sm:hidden');
            exploreDropDown.classList.add('sm:block');
        }
        else{
            div.dataset.open='false';
            exploreDropDownMb.style.marginTop="120px";
            exploreDropDownMb.classList.remove('block');
            exploreDropDownMb.classList.add('hidden');
            exploreDropDown.style.marginTop="120px";
            exploreDropDown.classList.remove('sm:block');
            exploreDropDown.classList.add('sm:hidden');
        }
    }
</script>

