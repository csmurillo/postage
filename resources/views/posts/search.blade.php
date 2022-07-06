@extends('layouts.app')

@section('content')
<div class="px-10 md:px-48">
    {{-- <h1 class="text-4xl">Search</h1> --}}
    {{-- mobile options --}}
    <div class="w-full">
        <button class="flex justify-end md:hidden" onclick="toggleFilters()">Filters</button>
        <div id="filters" class="w-full right-0 hidden md:w-2/12 md:block md:relative">
            <div class="mx-10 border md:mx-0 md:border-none">
                <div>
                    <h2 class="text-xl mb-3 border-b-2">Category</h2>
                    <div>
                        <input type="checkbox" id="autonomous-driving" name="autonomous-driving">
                        <label class="text-sm" for="autonomous-driving">Autonomous Driving</label>
                    </div>
                    <div>
                        <input type="checkbox" id="crypto" name="crypto" >
                        <label class="text-sm" for="crypto">Crypto</label>
                    </div>
                    <div>
                        <input type="checkbox" id="hardware" name="hardware" >
                        <label class="text-sm" for="hardware">Hardware</label>
                    </div>
                    <div>
                        <input type="checkbox" id="programming-languages" name="programming-languages" >
                        <label class="text-sm" for="programming-languages">Programming Languages</label>
                    </div>
                    <div>
                        <input type="checkbox" id="rocket-science" name="rocket-science" >
                        <label class="text-sm" for="rocket-science">Rocket Science</label>
                    </div>
                    <div>
                        <input type="checkbox" id="virtual-reality" name="virtual-reality" >
                        <label class="text-sm" for="virtual-reality">Virtual Reality</label>
                    </div>
                </div>
            </div>
            <div class="mx-10 border md:mx-0 md:border-none">
                <h2 class="text-xl mb-3 border-b-2">Topics</h2>
                <div>
                    <input type="checkbox" id="comma-ai" name="comma-ai">
                    <label class="text-sm" for="comma-ai">Comma ai</label>
                </div>
                <div>
                    <input type="checkbox" id="google-self-driving" name="google-self-driving" >
                    <label class="text-sm" for="google-self-driving">Google Self Driving</label>
                </div>
                <div>
                    <input type="checkbox" id="tesla-self-driving" name="tesla-self-driving" >
                    <label class="text-sm" for="tesla-self-driving">Tesla Self Driving</label>
                </div>
                <div>
                    <input type="checkbox" id="bitcoin" name="bitcoin" >
                    <label class="text-sm" for="bitcoin">Bitcoin</label>
                </div>
                <div>
                    <input type="checkbox" id="etheruem" name="etheruem" >
                    <label class="text-sm" for="etheruem">Etheruem</label>
                </div>
                <div>
                    <input type="checkbox" id="cardano" name="cardano" >
                    <label class="text-sm" for="cardano">Cardano</label>
                </div>
                <div>
                    <input type="checkbox" id="dogecoin" name="dogecoin" >
                    <label class="text-sm" for="dogecoin">Dogecoin</label>
                </div>
                <div id="hidden-labels" class="hidden">
                    <div>
                        <input type="checkbox" id="amd" name="amd" >
                        <label class="text-sm" for="amd">AMD</label>
                    </div>
                    <div>
                        <input type="checkbox" id="nvidia" name="nvidia" >
                        <label class="text-sm" for="nvidia">Nvidia</label>
                    </div>
                    <div>
                        <input type="checkbox" id="c++" name="c++" >
                        <label class="text-sm" for="c++">C++</label>
                    </div>
                    <div>
                        <input type="checkbox" id="python" name="python" >
                        <label class="text-sm" for="python">Python</label>
                    </div>
                    <div>
                        <input type="checkbox" id="ruby-on-rails" name="ruby-on-rails" >
                        <label class="text-sm" for="ruby-on-rails">Ruby on Rails</label>
                    </div>
                    <div>
                        <input type="checkbox" id="javascript" name="javascript" >
                        <label class="text-sm" for="javascript">Javascript</label>
                    </div>
                    <div>
                        <input type="checkbox" id="oculus" name="oculus" >
                        <label class="text-sm" for="oculus">Oculus</label>
                    </div>
                    <div>
                        <input type="checkbox" id="playstationvr" name="playstationvr" >
                        <label class="text-sm" for="playstationvr">Playstationvr</label>
                    </div>
                </div>
                <div id="show-btn" class="block">
                    <input class="underline" type="button" value="Show All" onclick="toggleShowLabels('show-btn');"/>
                </div>
                <div id="hide-btn" class="hidden">
                    <input class="underline" type="button" value="Show Less" onclick="toggleShowLabels('hide-btn');"/>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function toggleFilters(){
        const filters=document.getElementById('filters');
        if(filters.classList.contains('hidden')){
            filters.classList.remove('hidden');
            filters.classList.add('absolute');
        }
        else{
            filters.classList.remove('absolute');
            filters.classList.add('hidden');
        }
    }
    function toggleShowLabels(btn){
        const hiddenLabels=document.getElementById('hidden-labels');
        const showBtn=document.getElementById('show-btn');
        const hideBtn=document.getElementById('hide-btn');
        if(btn=="show-btn"){
            hideBtn.classList.remove('hidden');
            hideBtn.classList.add('block');
            showBtn.classList.remove('flex');
            showBtn.classList.add('hidden');
            hiddenLabels.classList.remove('hidden');
            hiddenLabels.classList.add('flex');
            hiddenLabels.classList.add('flex-col');

        }        
        else if(btn=="hide-btn"){
            hideBtn.classList.remove('block');
            hideBtn.classList.add('hidden');
            showBtn.classList.remove('hidden');
            showBtn.classList.add('block');
            hiddenLabels.classList.remove('flex');
            hiddenLabels.classList.remove('flex-col');
            hiddenLabels.classList.add('hidden');
        }
        
    }

</script>


@endsection


