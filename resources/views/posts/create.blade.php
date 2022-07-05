@extends('layouts.app')

@section('content')
<div class="relative flex flex-col sm:px-5 lg:px-36">
    
    <div id="preview-create" class="hidden">

        <div class="mb-5">
            <input class="text-lg py-1 px-3 border rounded text-black bg-white" type="button" value="Back" onclick="back()"/>
        </div>

        <div id='preview-content' class="px-4">
            <h1 id="preview-title" class="text-2xl"></h1>
            <div id="preview-paragraph-container">

            </div>
        </div>

    </div>

    <form id="create-form" action="/post" enctype="multipart/form-data" method="post" onsubmit="setContent()">
        @csrf

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" />
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
        
        {{-- <div class="relative mb-5">
            <label class="text-sm">Paragraph</label>
            <textarea id="content" name="content" class="w-full paragraph" placeholder="Type Here!!!" rows="10">{{ old('content') }}</textarea>
            <div class="absolute right-0">
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph" />
            </div>
            @error('content')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}
        {{--  --}}
        <textarea id="content" name="content" class="hidden" placeholder="Type Here!!!" rows="10"></textarea>
        {{--  --}}
        
        {{--  --}}
        <div class="w-full">
            <div class="flex">
                <label class="text-lg">Title:</label>
                <input type="text" name="titleid-681892" class="title flex-1 border-b-2">
            </div>
            <div class="relative mb-5">
                <label class="text-lg">Paragraph</label>
                <textarea class="w-full paragraph border-2" placeholder="Type Here!!!" rows="10"></textarea>
                <div class="absolute right-0">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph">
                </div>
            </div>
        </div>
        {{--  --}}
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

@endsection

<script>
    // id state
    let titleId='titleid-';
    function getTitleId(){
        return titleId+''+Math.floor(Math.random() * (999999 - 100000) + 100000);
    }

    function createTitle(){
        const div = document.createElement("div");
        div.classList.add("flex");;
        const label= document.createElement("label");
        label.classList.add("text-lg");
        let id=getTitleId();
        label.for=id;
        label.innerText="Title:";
        const input = document.createElement('input');
        input.type="text";
        input.name=id;
        input.classList.add("title");
        input.classList.add("flex-1");
        input.classList.add("border-b-2");
        
        div.append(label);
        div.append(input);
        return div;
    }

    function createParagraph(){
        const div = document.createElement("div");
        div.innerHTML=`
            <div class="relative mb-5">
                <label class="text-lg">Paragraph</label>
                <textarea class="w-full paragraph border-2" placeholder="Type Here!!!" rows="10"></textarea>
                <div class="absolute right-0">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph" />
                </div>
            </div>
        `;
        return div;
    }
    function addInputSection(button){
        const section = document.createElement("div");
        section.classList.add("w-full");
        const title=createTitle();
        const paragraph=createParagraph();
        section.append(title);
        section.append(paragraph);

        const topLevelParent=button.parentElement.parentElement;

        topLevelParent.parentElement.insertBefore(section,topLevelParent.nextSibling);
    }
    
    function previewPost(){
        const form =document.getElementById('create-form');
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
            const div = document.createElement("div");
            div.innerHTML=paragraphs[i].value;
            paragraphContainer.append(div);
        }
        // alert(paragraphs.length);
    }

    function back(){
        const form =document.getElementById('create-form');
        const prevCreate=document.getElementById('preview-create');
        prevCreate.classList.remove('block');
        prevCreate.classList.add('hidden');
        form.classList.remove('hidden');
        const paragraphContainer=document.getElementById('preview-paragraph-container');
        paragraphContainer.innerHTML="";
    }

    function setContent(){
        
        let titles=document.getElementsByClassName('title');
        let paragraphs=document.getElementsByClassName('paragraph');
        let loops=titles.length;
        alert('loops'+loops+'!~'+titles[0].value);

        let content=document.getElementById('content');
        for(let i=0; i<=loops;i++){
            if(titles[i].value){
                content.value=content.value+`<h1>${titles[i].value}</h1>`;
            }
            if(paragraphs[i].value){
                content.value=content.value+`<p>${paragraphs[i].value}</p>`;
            }
            alert(titles[i].value);
            alert(content.value);
            
        }
        alert(content.value);
        
    }

</script>




