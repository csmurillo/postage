@extends('layouts.app')

@section('content')
<div class="relative flex flex-col sm:px-5 lg:px-36">
    
    <div id="preview-create" class="hidden">
        <div class="mb-5">
            <input class="text-lg py-1 px-3 md:p-28 border rounded text-black bg-white" type="button" value="Back" onclick="back()"/>
        </div>
        <div id='preview-content' class="px-4">
            <h1 id="preview-title" class="text-2xl"></h1>
            <div id="preview-paragraph-container">
            </div>
        </div>
    </div>

    <form id="form" action="/post/{{$post->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="flex mb-4">
            <label class="text-xl" for="title">Post Title:</label>
            <input id="title" class="flex-1 text-lg" name="title" type="text" value="{{$post->title}}"/>
        </div>
        
        <div class="flex mb-4">
            <label for="pet-select" class="text-xl">Category:</label>

            <select class="text-xl flex-1" name="topic" id="pet-select">
                <option value="">--Please choose an option--</option>
                <option value="autonomousDriving" {{$post->topic=='autonomousDriving'?'selected':''}}>Autonomous Driving</option>
                <option value="crypto" {{$post->topic=='crypto'?'selected':''}}>Crypto</option>
                <option value="hardware" {{$post->topic=='hardware'?'selected':''}}>Hardware</option>
                <option value="programmingLanguages" {{$post->topic=='programmingLanguages'?'selected':''}}>Programming Languages</option>
                <option value="rocketScience" {{$post->topic=='rocketScience'?'selected':''}}>Rocket Science</option>
                <option value="virtualReality" {{$post->topic=='virtualReality'?'selected':''}}>Virtual Reality</option>
            </select>
        </div>
        
        <div class="relative mb-5">
            <label class="text-sm">Paragraph</label>
            <textarea id="content" name="content" class="w-full paragraph" placeholder="Type Here!!!" rows="10">{{strip_tags($post['content'])}}</textarea>
            <div class="absolute right-0">
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addParagraph(this);" value="Add Paragraph" />
            </div>
        </div>

        <div class="flex justify-center gap-4">
            <div id="e" class="">
                <button class="bg-white border p-2 rounded" type="submit">Update Post</button>
            </div>
            <input class="border p-2 rounded bg-slate-200" type="button" onclick="previewPost()" value="Preview"/>
        </div>
    </form>
</div>

@endsection


<script>
    function addParagraph(button){
        const div = document.createElement("div");
        div.innerHTML=`
            <div class="relative mb-5">
                <label class="text-sm">Paragraph</label>
                <textarea class="w-100 paragraph" placeholder="Type Here!!!" rows="10"></textarea>
                <div class="absolute right-0">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addParagraph(this);" value="Add Paragraph" />
                </div>
            </div>
        `;
        const topLevelParent=button.parentElement.parentElement;
        topLevelParent.parentElement.insertBefore(div,topLevelParent.nextSibling);
    }
    function previewPost(){
        const form =document.getElementById('form');
        const title=document.getElementById('title').value;

        const prevCreate=document.getElementById('preview-create');
        const prevTitle=document.getElementById('preview-title');

        
        if(title.length>0){
            prevTitle.innerHTML=title;
        }
        else{
            prevTitle.innerHTML="TITLE NOT SET"
        }
        prevCreate.classList.remove('hidden');
        prevCreate.classList.add('block');
        form.classList.add('hidden');

        // add paragraphs to preview-paragraph-container
        const paragraphContainer=document.getElementById('preview-paragraph-container');
        const paragraphs=document.getElementsByClassName("paragraph");
        for(let i=0;i<=paragraphs.length;i++){
            // alert('~');
            const div = document.createElement("div");
            div.innerHTML=paragraphs[i].value;
            // alert(paragraphs[i]);
            paragraphContainer.append(div);
        }
        alert(paragraphs.length);
    }
    function back(){
        const form =document.getElementById('form');
        const prevCreate=document.getElementById('preview-create');
        prevCreate.classList.remove('block');
        prevCreate.classList.add('hidden');
        form.classList.remove('hidden');
        const paragraphContainer=document.getElementById('preview-paragraph-container');
        paragraphContainer.innerHTML="";
    }
</script>


