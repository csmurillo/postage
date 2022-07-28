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
    <form id="create-form" action="/post" enctype="multipart/form-data" method="post" onsubmit="setContent(event);">
        @csrf
        <div class="flex gap-2 mb-4">
            <label for="image" class="text-xl">Cover Image:</label>
            <div class="flex-1 flex items-center">
                <label class="w-full bg-blue-500 text-center text-white py-1 rounded cursor-pointer" for="image">Choose Image</label>
                <input type="file" name="image" id="image" class="hidden" onchange="fileCoverImage(this);"/>
            </div>
        </div>
        <div class="flex mb-4">
            <label class="text-xl" for="title">Post Title:</label>
            <input id="title" class="flex-1 text-lg" name="title" type="text" value="{{ old('title') }}" onchange="updateTitle(this)"/>
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
                <option value="autonomousDriving" {{old('topic')=='autonomousDriving'?'selected':''}}>Autonomous Driving</option>
                <option value="crypto" {{old('topic')=='crypto'?'selected':''}}>Crypto</option>
                <option value="hardware" {{old('topic')=='hardware'?'selected':''}}>Hardware</option>
                <option value="programmingLanguages" {{old('topic')=='programmingLanguages'?'selected':''}}>Programming Languages</option>
                <option value="rocketScience" {{old('topic')=='rocketScience'?'selected':''}}>Rocket Science</option>
                <option value="virtualReality" {{old('topic')=='virtualReality'?'selected':''}}>Virtual Reality</option>
            </select>
            @error('topic')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <textarea id="content" name="content" class="hidden" placeholder="Type Here!!!" rows="10"></textarea>
        <div id="content-container" class="w-full">
            <div class="w-full mb-2 border-b-2">
                <div>
                    <div class="flex">
                        <label class="text-lg">Title:</label>
                        <input type="text" name="content-496475" class="field title flex-1 border-b-2" onkeydown="updateContent(this)"/>
                    </div>
                </div>
                <div class="relative mb-5">
                <label class="text-lg">Paragraph</label>
                <textarea name="content-496475" class="w-full paragraph border-2 field mb-4" placeholder="Type Here!!!" rows="10" onkeydown="updateContent(this)"></textarea>
                <div class="w-full flex justify-end gap-2">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph">
                </div>
            </div>
        </div>
        @error('content')
            <span class="">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="flex justify-center gap-4">
            <div id="e" class="">
                <button type="submit" class="bg-white border p-2 rounded"  onsubmit="setContent(event);">Create Post</button>
            </div>
            <input class="border p-2 rounded bg-slate-200" type="button" onclick="previewPost()" value="Preview"/>
        </div>
    </form>
</div>

<script src="{{ asset('js/setImageSection.js') }}"></script>
<script src="{{ asset('js/setInputSection.js') }}"></script>
<script src="{{ asset('js/previewPost.js') }}"></script>
@endsection
<script>
    // used in edit 
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
    // 
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
    function setContent(e){
        let content=document.getElementById('content');
        content.value="";
        const fields=document.getElementsByClassName('field');
        
        let title = document.getElementById('title');
        let topic = document.getElementById('topic');

        if(title.value.length==0){
            title.classList.add('border-2');
            title.classList.add('border-red-500');
            title.classList.add('rounded');
            e.preventDefault();
        }
        if(!topic.value){
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
                    alert(content.value);
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
</script>