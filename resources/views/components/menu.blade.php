<div id="menu" class="bg-white hidden md:hidden absolute h-full w-full z-[999999] min-h-[500px] mt-[120px] border-t-2">
    <ul>
        <a href="{{ url('/home') }}">
            <li class="text-lg w-full flex justify-center items-center h-16 border-b-2">
                Home
            </li>
        </a>
        <a href="{{ url('/dashboard') }}">
            <li class="text-lg w-full flex justify-center items-center h-16 border-b-2">
                Dashboard
            </li>
        </a>
        <a href="{{ url('/settings') }}">
            <li class="text-lg w-full flex justify-center items-center h-16 border-b-2">
                Settings
            </li>
        </a>
        <li class="text-lg w-full flex justify-center items-center h-16 border-b-2 cursor-pointer">
            <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
    </ul>
</div>