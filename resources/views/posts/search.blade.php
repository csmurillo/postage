@extends('layouts.app')

@section('content')
<div class=" px-4 sm:px-4 md:px-28 lg:px-48">
    <div class="w-full flex xl:flex-row flex-col">
        <div class="px-10 w-full flex justify-end xl:hidden">
            <button onclick="toggleFilters()">Filters</button>
        </div>
        <div id="filters" class="w-full right-0 hidden xl:w-2/12 xl:block xl:relative bg-white z-[2]">
            <div class="mx-10 md:mx-28 lg:mx-56 xl:mx-0 md:border-none mb-2">
                <h2 class="text-xl mb-3 border-b-2">Search</h2>
                <div class="w-full">
                    <input id="search" class="border w-full" type="text" name="search"/>
                </div>
            </div>
            <div class="mx-10 md:mx-28 lg:mx-56 xl:mx-0 md:border-none mb-2">
                <div>
                    <h2 class="text-xl mb-3 border-b-2">Category</h2>
                    <div>
                        <input type="checkbox" id="autonomousDriving" name="categories[]" onclick="categoryCheck(this)">
                        <label class="text-sm" for="autonomousDriving">Autonomous Driving</label>
                    </div>
                    <div>
                        <input type="checkbox" id="crypto" name="categories[]" onclick="categoryCheck(this)">
                        <label class="text-sm" for="crypto">Crypto</label>
                    </div>
                    <div>
                        <input type="checkbox" id="hardware" name="categories[]" onclick="categoryCheck(this)">
                        <label class="text-sm" for="hardware">Hardware</label>
                    </div>
                    <div>
                        <input type="checkbox" id="programmingLanguages" name="categories[]" onclick="categoryCheck(this)">
                        <label class="text-sm" for="programmingLanguages">Programming Languages</label>
                    </div>
                    <div>
                        <input type="checkbox" id="rocketScience" name="categories[]" onclick="categoryCheck(this)">
                        <label class="text-sm" for="rocketScience">Rocket Science</label>
                    </div>
                    <div>
                        <input type="checkbox" id="virtualReality" name="categories[]" onclick="categoryCheck(this)">
                        <label class="text-sm" for="virtualReality">Virtual Reality</label>
                    </div>
                </div>
            </div>
            <div class="mx-10 md:mx-28 lg:mx-56 xl:mx-0 md:border-none mb-2">
                <h2 class="text-xl mb-3 border-b-2">Topics</h2>
                <div>
                    <input type="checkbox" id="commaAi" name="topics[]">
                    <label class="text-sm" for="commaAi">Comma ai</label>
                </div>
                <div>
                    <input type="checkbox" id="googleSelfDriving" name="topics[]" >
                    <label class="text-sm" for="googleSelfDriving">Google Self Driving</label>
                </div>
                <div>
                    <input type="checkbox" id="teslaSelfDriving" name="topics[]" >
                    <label class="text-sm" for="teslaSelfDriving">Tesla Self Driving</label>
                </div>
                <div>
                    <input type="checkbox" id="bitcoin" name="topics[]" >
                    <label class="text-sm" for="bitcoin">Bitcoin</label>
                </div>
                <div>
                    <input type="checkbox" id="etheruem" name="topics[]" >
                    <label class="text-sm" for="etheruem">Etheruem</label>
                </div>
                <div>
                    <input type="checkbox" id="cardano" name="topics[]" >
                    <label class="text-sm" for="cardano">Cardano</label>
                </div>
                <div>
                    <input type="checkbox" id="dogecoin" name="topics[]" >
                    <label class="text-sm" for="dogecoin">Dogecoin</label>
                </div>
                <div id="hidden-labels" class="hidden">
                    <div>
                        <input type="checkbox" id="amd" name="topics[]" >
                        <label class="text-sm" for="amd">AMD</label>
                    </div>
                    <div>
                        <input type="checkbox" id="nvidia" name="topics[]" >
                        <label class="text-sm" for="nvidia">Nvidia</label>
                    </div>
                    <div>
                        <input type="checkbox" id="c++" name="topics[]" >
                        <label class="text-sm" for="c++">C++</label>
                    </div>
                    <div>
                        <input type="checkbox" id="python" name="topics[]" >
                        <label class="text-sm" for="python">Python</label>
                    </div>
                    <div>
                        <input type="checkbox" id="rubyOnRails" name="topics[]" >
                        <label class="text-sm" for="rubyOnRails">Ruby on Rails</label>
                    </div>
                    <div>
                        <input type="checkbox" id="javascript" name="topics[]" >
                        <label class="text-sm" for="javascript">Javascript</label>
                    </div>
                    <div>
                        <input type="checkbox" id="oculus" name="topics[]" >
                        <label class="text-sm" for="oculus">Oculus</label>
                    </div>
                    <div>
                        <input type="checkbox" id="playstationVr" name="topics[]" >
                        <label class="text-sm" for="playstationVr">Playstationvr</label>
                    </div>
                </div>
                <div id="show-btn" class="block">
                    <input class="underline" type="button" value="Show All" onclick="toggleShowLabels('show-btn');"/>
                </div>
                <div id="hide-btn" class="hidden">
                    <input class="underline" type="button" value="Show Less" onclick="toggleShowLabels('hide-btn');"/>
                </div>
                <div>
                    <button type="button" class="w-full border-2 py-2 rounded bg-blue-500 text-white" onclick="updateFilters()">Update Filters</button>
                </div>
            </div>
        </div>
        <div class="flex-1 px-6">
            <h1 id="search-name" class="text-xl">All</h1>
            <div id="posts" class="sm:grid md:grid-cols-3 sm:grid-cols-2 flex flex-col gap-4 mb-4">
            @foreach($posts as $post)
                <x-card :post="$post"></x-card>
            @endforeach
            </div>
            <div class="h-10">
                <div>
                    {{$posts->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // new functions
    window.onload=()=>{
        // posts
        var posts = document.getElementById('posts');
        // topics checkbox
        var topicsCheckbox = document.getElementsByName("topics[]");
        // category checkbox
        var categoriesCheckbox = document.getElementsByName("categories[]");

        var searchName = document.getElementById('search-name');

        let url = new URL(window.location.href);
        let category=url.searchParams.get("category")?url.searchParams.get("category"):'';
        let topics=url.searchParams.get("topic")?url.searchParams.get("topic").split(','):'';
        let search=url.searchParams.get("search")?url.searchParams.get("search"):'';

        // topics checkbox
        for(var i=0; i<topics.length;i++){
            for(var j=0; j<topicsCheckbox.length;j++){
                if(topics[i]==topicsCheckbox[j].id){
                    topicsCheckbox[j].checked=true;
                }
            }
        }
        // categories checkbox
        for(let x=0; x<categoriesCheckbox.length;x++){
            if(categoriesCheckbox[x].id==category){
                categoriesCheckbox[x].checked=true;
            }
        }
        // search
        if(search){
            searchName.innerHTML='Search: '+search;
        }
        else if(posts.childElementCount==0){
            searchName.innerHTML='No Results Found';
        }
        else{
            searchName.innerHTML='Results';
        }
    };
    function categoryCheck(currentCategory){
        var categories = document.getElementsByName("categories[]");
        if(!currentCategory.checked){
            currentCategory.checked=false;
        }
        else{
            for(let i=0;i<categories.length;i++){
            categories[i].checked=false; 
            }
            currentCategory.checked=true;
        }
    }
    function updateFilters(){
        let url = new URL(window.location.origin+window.location.pathname);

        // query
        let search='';
        let category='';
        let topic='';

        // check search
        var searchInput = document.getElementById('search');

        // check categories
        var categories = document.getElementsByName("categories[]");
        for(let i=0; i<categories.length;i++){
            if(categories[i].checked){
                category=categories[i].id;
            }
        }
        // check topics
        var topics = document.getElementsByName("topics[]");
        for(let i=0; i<topics.length;i++){
            if(topics[i].checked){
                topic=topic+topics[i].id+',';
            }
        }
        if(searchInput.value.length>0){
            url.searchParams.append('search',searchInput.value);
        }
        if(category.length>0){
            url.searchParams.append('category', category);
        }
        if(topic.length>0){
            url.searchParams.append('topic', topic);
        }
        if(category.length!=0 || topic.length!=0||searchInput.value.length>0){
            window.location.href=url;
        }
        if(searchInput.value.length==0 && category.length==0 && topic.length==0){
            window.location.href=url;
        }
    }

    function toggleFilters(){
        const filters=document.getElementById('filters');
        if(filters.classList.contains('hidden')){
            filters.classList.remove('hidden');
            filters.classList.add('absolute');
            filters.classList.add('mt-6');
        }
        else{
            filters.classList.remove('absolute');
            filters.classList.remove('mt-6');
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


