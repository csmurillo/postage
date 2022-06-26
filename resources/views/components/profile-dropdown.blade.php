<div class="relative w-32 flex justify-center">
    <div>
        <div class="flex flex-col cursor-pointer" onclick="profileDropdown()">
            <x-css-profile class="h-12 w-12 text-slate-400"/>
            <p class="text-center select-none">{{Auth::user()->username}}</p>
        </div>
        <div id="profile-dropdown" class="absolute left-0 w-full justify-center hidden">
            <ul class="border-t-[.05rem] border-x-[.05rem]">
                <li class="bg-white border-b-[.05rem] rounded-sm text-center w-28 py-2">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="bg-white border-b-[.05rem] rounded-sm text-center w-28 py-2">
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                <li class="bg-white border-b-[.05rem] rounded-sm text-center w-28 py-2">
                    <a href="{{ url('/settings') }}">Settings</a>
                </li>
                <li class="bg-white border-b-[.05rem] rounded-sm text-center w-28 py-2">
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    function profileDropdown(){
        const profileDropdown = document.getElementById('profile-dropdown');
        if(profileDropdown.classList.contains('hidden')){
            profileDropdown.classList.remove('hidden');
            profileDropdown.classList.add('flex');
        }
        else{
            profileDropdown.classList.remove('flex');
            profileDropdown.classList.add('hidden');
        }
    }
</script>