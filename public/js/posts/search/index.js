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

// Category Checkbox
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

// Update Filters 
function updateFilters(){
    let url = new URL(window.location.origin+window.location.pathname);

    // query
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
