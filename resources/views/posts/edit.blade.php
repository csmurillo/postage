@extends('layouts.app')
@section('content')
<div class="relative flex flex-col px-4 sm:px-10 md:px-20 lg:px-48 xl:px-72">
    <div id="preview-create" class="hidden">
        <div class="mb-5">
            <input class="text-lg py-1 px-3 border rounded text-black bg-white" type="button" value="Back" onclick="back()"/>
        </div>
        <div id='preview-content' class="px-4">
            <h1 id="preview-title" class="text-2xl"></h1>
            <div id="preview-field-container">
            </div>
        </div>
    </div>
    <form id="create-form" action="/post/{{$post->id}}" enctype="multipart/form-data" method="post" onsubmit="setContent(event);">
        @csrf
        @method('PATCH')
        <div class="flex gap-2 mb-4">
            <label for="image" class="text-xl">Cover Image:</label>
            <div class="flex-1 flex items-center">
                <label class="w-full bg-blue-500 text-center text-white py-1 rounded cursor-pointer" for="image">{{$post['image']?'Edit Cover Image':'Choose Image'}}</label>
                <input type="file" name="image" id="image" class="hidden" onchange="fileCoverImage(this);"/>
            </div>
        </div>
        <div class="flex mb-4">
            <label class="text-xl" for="title">Post Title:</label>
            <input id="title" class="flex-1 text-lg" name="title" type="text" value="{{ $post['title'] ?? old('title') }}"/>
            @error('title')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex mb-4">
            <label for="pet-select" class="text-xl">Category:</label>

            <select class="text-xl flex-1" name="topic" id="topic" onchange="updateTopic(this)">
                <option value="">--Please choose an option--</option>
                <option value="autonomousDriving" {{$post['topic']=='autonomousDriving'?'selected':''}}>Autonomous Driving</option>
                <option value="crypto" {{$post['topic']=='crypto'?'selected':''}}>Crypto</option>
                <option value="hardware" {{$post['topic']=='hardware'?'selected':''}}>Hardware</option>
                <option value="programmingLanguages" {{$post['topic']=='programmingLanguages'?'selected':''}}>Programming Languages</option>
                <option value="rocketScience" {{$post['topic']=='rocketScience'?'selected':''}}>Rocket Science</option>
                <option value="virtualReality" {{$post['topic']=='virtualReality'?'selected':''}}>Virtual Reality</option>
            </select>
            @error('topic')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <textarea id="content" name="content" class="hidden" placeholder="Type Here!!!" rows="10"></textarea>
        <div id="content-container" class="w-full">
            {{-- content --}}
        </div>
        @error('content')
            <span class="">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="flex justify-center gap-4">
            <div id="e" class="">
                <button type="submit" class="bg-white border p-2 rounded">Update Post</button>
            </div>
            <input class="border p-2 rounded bg-slate-200" type="button" onclick="previewPost()" value="Preview"/>
        </div>
    </form>
</div>

<script src="{{ asset('js/setImageSection.js') }}"></script>
<script src="{{ asset('js/setInputSection.js') }}"></script>
<script src="{{ asset('js/editImageSection.js') }}"></script>
<script src="{{ asset('js/editInputSection.js') }}"></script>
<script src="{{ asset('js/previewPost.js') }}"></script>
@endsection
<script>
    function fileCoverImage(inputFile){
        var reader  = new FileReader();
        reader.onloadend = function () {
            if(reader.result){
            inputFile.parentElement.children[0].innerHTML=inputFile.files[0].name;;
        }
            
        }
        if(inputFile.files && inputFile.files[0]){
            reader.readAsDataURL(inputFile.files[0]);
        }
        else{
            inputFile.parentElement.children[0].innerHTML="Choose Image";
        }
    }
    // function setContent(e){
    //     let content=document.getElementById('content');
    //     const fields=document.getElementsByClassName('field');
    //     for(let i=0; i<fields.length; i++){ 
    //         if(fields[i].classList.contains('title')){
    //             if(fields[i].value){
    //                 content.value=content.value+`<h1>${fields[i].value}</h1>`;
    //             }
    //         }
    //         if(fields[i].classList.contains('paragraph')){
    //             if(fields[i].value){
    //                 content.value=content.value+`<p>${fields[i].value}</p>`;
    //             }
    //         }
    //         if(fields[i].classList.contains('image')){
    //             if(!fields[i].files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
    //                 let error=document.getElementById(fields[i].id+'-error');
    //                 alert(error);
    //                 if(error==null){
    //                     const div=document.createElement('div');
    //                     div.id=fields[i].id+'-error';
    //                     div.classList.add('text-red-500');
    //                     div.innerHTML='Not Valid Image Type';
    //                     fields[i].parentElement.parentElement.parentElement.append(div);
    //                 }
    //                 e.preventDefault();
    //             }
    //             else if((fields[i].files[0].size/1024/1024) > 2 ){
    //                 let error=document.getElementById(fields[i].id+'-error');
    //                 if(error==null){
    //                     const div=document.createElement('div');
    //                     div.id=fields[i].id+'-error';
    //                     div.classList.add('text-red-500');
    //                     div.innerHTML='Not Valid Image File Size Must Be Less Than 2GB';
    //                     fields[i].parentElement.parentElement.parentElement.append(div);
    //                 }
    //                 e.preventDefault();
    //             }
    //             else if(fields[i].dataset.image=='unedited'){
    //                 content.value=content.value+`<img id="${fields[i].id}" />`;
    //             }
    //             else if(fields[i].files && fields[i].files[0]){
    //                 content.value=content.value+`<img id="${fields[i].id}" />`;
    //             }
    //         }
    //     }
    //     alert(content.value);
    // }
    // edit variables
    function getImageUrl(id){        
        var image1 = {!! json_encode($post['image1']) !!};
        var image2 = {!! json_encode($post['image2']) !!};
        var image3 = {!! json_encode($post['image3']) !!};
        var image4 = {!! json_encode($post['image4']) !!};
        var image5 = {!! json_encode($post['image5']) !!};

        if(id=="image1"){
            return image1;
        }
        else if(id=="image2"){
            return image2;
        }
        else if(id=="image3"){
            return image3;
        }
        else if(id=="image4"){
            return image4;
        }
        else if(id=="image5"){
            return image5;
        }
        else{
            return null;
        }
    }
    //////////////////////////////////////////////////////////////////////////
    function setupEditForm(){
        var content = {!! json_encode($post['content']) !!};    
        var contentArray = content.match(/<h1>.*?<\/h1>|<p>.*?<\/p>|<img.*?\/>/g);
        // alert(contentArray);
        const contentContainer = document.getElementById('content-container');

        let i=0;
        while(i<contentArray.length){
            if(contentArray[i].includes('<h1>')){

                let section;
                const h1Content=contentArray[i].replaceAll(/<h1>|<\/h1>/g,'');
                let paragraphContent;

                if(contentArray[i+1].includes('<p>'))
                {
                    // paragraph value
                    paragraphContent=contentArray[i+1].replaceAll(/<p>|<\/p>/g,'');
                    i=i+2;
                }
                else
                {
                    paragraphContent=null;
                    i=i+1;
                }
                section=addEditInputSection(h1Content,paragraphContent);
                // append section that contains h1 and p
                contentContainer.append(section);
            }
            else if(contentArray[i].includes('<p>')){
                let section;
                let h1Content='';
                let paragraphContent=contentArray[i].replaceAll(/<p>|<\/p>/g,'');
                
                section=addEditInputSection(h1Content,paragraphContent);
                i=i+1;
                // append section that contains h1 and p
                contentContainer.append(section);
            }
            else if(contentArray[i].includes('<img')){
                let imageId=contentArray[i].replaceAll(/<img|\/>/g,'').toString().replaceAll(/id="|"/g,'').trim();
                let imageSection=addEditImageSection(imageId);
                contentContainer.append(imageSection);
                i++;
            }  
        }
    }

    window.onload=()=>{
        setupEditForm();
    };
    // used in create
    function updateTitle(title){
        title.classList.remove('border-2');
        title.classList.remove('border-red-500');
        title.classList.remove('rounded');
    }
    function updateTopic(topic){
        topic.classList.remove('border-2');
        topic.classList.remove('border-red-500');
        topic.classList.remove('rounded');
    }
    function setContent(e){
        let content=document.getElementById('content');
        content.value="";
        const fields=document.getElementsByClassName('field');
        
        let title = document.getElementById('title');
        let topic = document.getElementById('topic');
        // alert(topic.value);
        if(title.value.length==0){
            title.classList.add('border-2');
            title.classList.add('border-red-500');
            title.classList.add('rounded');
            e.preventDefault();
        }
        if(!topic.value){
            // alert('inside');
            topic.classList.add('border-2');
            topic.classList.add('border-red-500');
            topic.classList.add('rounded');
            e.preventDefault();
        }
        for(let i=0; i<fields.length; i++){ 
            if(fields[i].classList.contains('title')){
                if(fields[i].value){
                    content.value=content.value+`<h1>${fields[i].value}</h1>`;
                }
            }
            if(fields[i].classList.contains('paragraph')){
                if(fields[i].value){
                    content.value=content.value+`<p>${fields[i].value}</p>`;
                }
                else{
                    let error=document.getElementById(fields[i].name+'-error');
                    if(error==null){
                        const div=document.createElement('div');
                        div.id=fields[i].name+'-error';
                        div.classList.add('text-red-500');
                        div.innerHTML='Please Provide Content';
                        fields[i].parentElement.parentElement.append(div);
                        e.preventDefault();
                    }
                }
            }
            if(fields[i].classList.contains('image')){
                if(fields[i].files.length==0){
                    // check if file exist to be edit
                    let validImage=getImageUrl(fields[i].id);
                    if(validImage==null){
                        let error=document.getElementById(fields[i].id+'-error');
                        if(error==null){
                            const div=document.createElement('div');
                            div.id=fields[i].id+'-error';
                            div.classList.add('text-red-500');
                            div.innerHTML='No Image';
                            fields[i].parentElement.parentElement.parentElement.append(div);
                        }
                        e.preventDefault();
                        continue;
                    }
                    else{
                        alert(fields[i].dataset.image);
                        if(fields[i].dataset.image!='unedited'){
                            const div=document.createElement('div');
                            div.id=fields[i].id+'-error';
                            div.classList.add('text-red-500');
                            div.innerHTML='No Image';
                            fields[i].parentElement.parentElement.parentElement.append(div);
                        }                   
                        else if(fields[i].dataset.image=='unedited'){
                            content.value=content.value+`<img id="${fields[i].id}" />`;
                            continue;
                        } 
                        e.preventDefault();
                        continue;
                    }
                }
            }
            if(fields[i].classList.contains('image')){
                if(!fields[i].files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
                    let error=document.getElementById(fields[i].id+'-error');
                    if(error==null){
                        const div=document.createElement('div');
                        div.id=fields[i].id+'-error';
                        div.classList.add('text-red-500');
                        div.innerHTML='Not Valid Image Type';
                        fields[i].parentElement.parentElement.parentElement.append(div);
                    }
                    e.preventDefault();
                }
                else if((fields[i].files[0].size/1024/1024) > 2 ){
                    let error=document.getElementById(fields[i].id+'-error');
                    if(error==null){
                        const div=document.createElement('div');
                        div.id=fields[i].id+'-error';
                        div.classList.add('text-red-500');
                        div.innerHTML='Not Valid Image File Size Must Be Less Than 2GB';
                        fields[i].parentElement.parentElement.parentElement.append(div);
                    }
                    e.preventDefault();
                }
                else if(fields[i].files && fields[i].files[0]){
                    content.value=content.value+`<img id="${fields[i].id}" />`;
                }
            }
        }
    }
    //////////////////////////////////////////////////////////////////////////
</script>