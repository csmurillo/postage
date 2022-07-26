<script>
    function mobileDropdown(dropdownTarget){
        const dropdown=dropdownTarget.parentElement.lastElementChild;
        if(dropdown.classList.contains('hidden')){
            dropdown.classList.remove('hidden');
            dropdown.classList.add('block');
        }
        else{
            dropdown.classList.remove('block');
            dropdown.classList.add('hidden');
        }
    }
</script>
<div id="explore-dropdown-mb" class="hidden sm:hidden bg-white absolute top-0 border-t-2 border-b-2 border-r-2 border-l-gray-800 rounded-br z-[9999]">
    <div class="relative py-4 border-b-[1px] border-l-gray-900">
        <div class="flex justify-between mx-10 hover:cursor-pointer z-50" onclick="mobileDropdown(this)">
            <p class="flex items-center hover:underline">Autonomous Driving</p>
            <span class="text-2xl">+</span>
        </div>
        <div class="hidden pl-10 pr-10 pt-2">
            <ul>
                <li>
                    <a href="/posts/search?search=comma+ai">CommaAi</a>
                </li>
                <li>
                    <a href="/posts/search?search=google+self+driving">Google Self Driving</a>
                </li>
                <li>
                    <a href="/posts/search?search=tesla+self+driving">Tesla Self Driving</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="relative py-4 border-b-[1px] border-l-gray-900">
        <div class="flex justify-between mx-10 hover:cursor-pointer" onclick="mobileDropdown(this)">
            <p class="flex items-center hover:underline">Crypto</p>
            <span class="text-2xl">+</span>
        </div>
        <div class="hidden pl-10 pr-10 pt-2">
            <ul>
                <li>
                    <a href="/posts/search?search=bitcoin">Bitcoin</a>
                </li>
                <li>
                    <a href="/posts/search?search=cardano">Cardano</a>
                </li>
                <li>
                    <a href="/posts/search?search=dogecoin">Dogecoin</a>
                </li>
                <li>
                    <a href="/posts/search?search=etheruem">Etheruem</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="relative py-4 border-b-[1px] border-l-gray-900">
        <div class="flex justify-between mx-10 hover:cursor-pointer" onclick="mobileDropdown(this)">
            <p class="flex items-center hover:underline">Hardware</p>
            <span class="text-2xl">+</span>
        </div>
        <div class="hidden pl-10 pr-10 pt-2">
            <ul>
                <li>
                    <a href="/posts/search?search=amd">AMD</a>
                </li>
                <li>
                    <a href="/posts/search?search=nvidia">NVIDIA</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="relative py-4 border-b-[1px] border-l-gray-900">
        <div class="flex justify-between mx-10 hover:cursor-pointer"onclick="mobileDropdown(this)"">
            <p class="w-48 flex items-center hover:underline">Programming Languages</p>
            <span class="text-2xl">+</span>
        </div>
        <div class="hidden pl-10 pr-10 pt-2">
            <ul>
                <li>
                    <a href="/posts/search?search=c%2B%2B">C++</a>
                </li>
                <li>
                    <a href="/posts/search?search=python">Python</a>
                </li>
                <li>
                    <a href="/posts/search?search=javascript">Javascript</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="relative py-4 border-b-[1px] border-l-gray-900">
        <div class="flex justify-between mx-10 hover:cursor-pointer"onclick="mobileDropdown(this)"">
            <p class="flex items-center hover:underline">Rocket Science</p>
            <span class="text-2xl">+</span>
        </div>
        <div class="hidden pl-10 pr-10 pt-2">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
    <div class="relative py-4">
        <div class="flex justify-between mx-10 hover:cursor-pointer"onclick="mobileDropdown(this)"">
            <p class="flex items-center hover:underline">Virtual Reality</p>
            <span class="text-2xl">+</span>
        </div>
        <div class="hidden pl-10 pr-10 pt-2">
            <ul>
                <li>
                    <a href="/posts/search?search=oculus">Oculus</a>
                </li>
                <li>
                    <a href="/posts/search?search=playstation+vr">Playstation VR</a>
                </li>
            </ul>
        </div>
    </div>
</div>