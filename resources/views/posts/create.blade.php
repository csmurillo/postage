@extends('layouts.app')
@section('content')
<div class="relative flex flex-col sm:px-5 lg:px-72">
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
    <form id="create-form" action="/post" enctype="multipart/form-data" method="post" onsubmit="setContent();">
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
            <input id="title" class="flex-1 text-lg" name="title" type="text" value="{{ old('title') }}"/>
            @error('title')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex mb-4">
            <label for="pet-select" class="text-xl">Category:</label>

            <select class="text-xl flex-1" name="topic" id="pet-select">
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
                <div class="flex">
                    <label class="text-lg">Title:</label>
                    <input type="text" name="titleid-363233" class="title flex-1 border-b-2 field">
                </div>
                <div class="relative mb-5">
                    <label class="text-lg">Paragraph</label>
                    <textarea class="w-full paragraph border-2 field mb-4" placeholder="Type Here!!!" rows="10"></textarea>
                    <div class="w-full flex justify-end gap-2">
                        <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
                        <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph">
                    </div>
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
                <button type="submit" class="bg-white border p-2 rounded">Create Post</button>
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
    function setContent(){
        let content=document.getElementById('content');
        const fields=document.getElementsByClassName('field');
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
            }
            if(fields[i].classList.contains('image')){
                if(fields[i].files && fields[i].files[0]){
                    content.value=content.value+`<img id="${fields[i].id}" />`;
                }
            }
        }
        alert(content.value);
    }
</script>