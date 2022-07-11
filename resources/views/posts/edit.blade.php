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

        <div class="flex">
            <div>
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" />
            </div>
            <div>
                <img id="cover-image" src="{{$post->image ? asset('storage/' . $post->image) : asset('images/defaultImage.png') }}" width="100px" height="100px"/>
            </div>
        </div>

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
        
        {{-- <div class="relative mb-5">
            <label class="text-sm">Paragraph</label>
            <textarea id="content" name="content" class="w-full paragraph" placeholder="Type Here!!!" rows="10">{{strip_tags($post['content'])}}</textarea>
            <div class="absolute right-0">
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addParagraph(this);" value="Add Paragraph" />
            </div>
        </div> --}}

        <textarea id="content" name="content" class="hidden" placeholder="Type Here!!!" rows="10"></textarea>

        <div id="content-container" class="w-full">
            
        </div>
        {{--  --}}
        @error('content')
            <span class="">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


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
    // id state
    let titleId='titleid-';
    function getTitleId(){
        return titleId+''+Math.floor(Math.random() * (999999 - 100000) + 100000);
    }
    // function previewPost(){
    //     const form =document.getElementById('form');
    //     const title=document.getElementById('title').value;

    //     const prevCreate=document.getElementById('preview-create');
    //     const prevTitle=document.getElementById('preview-title');

        
    //     if(title.length>0){
    //         prevTitle.innerHTML=title;
    //     }
    //     else{
    //         prevTitle.innerHTML="TITLE NOT SET"
    //     }
    //     prevCreate.classList.remove('hidden');
    //     prevCreate.classList.add('block');
    //     form.classList.add('hidden');

    //     // add paragraphs to preview-paragraph-container
    //     const paragraphContainer=document.getElementById('preview-paragraph-container');
    //     const paragraphs=document.getElementsByClassName("paragraph");
    //     for(let i=0;i<=paragraphs.length;i++){
    //         const div = document.createElement("div");
    //         div.innerHTML=paragraphs[i].value;
    //         paragraphContainer.append(div);
    //     }
    //     alert(paragraphs.length);
    // }
    function back(){
        const form =document.getElementById('form');
        const prevCreate=document.getElementById('preview-create');
        prevCreate.classList.remove('block');
        prevCreate.classList.add('hidden');
        form.classList.remove('hidden');
        const paragraphContainer=document.getElementById('preview-paragraph-container');
        paragraphContainer.innerHTML="";
    }
    
    function setupEditForm(){
        var content = {!! json_encode($post['content']) !!};    
        var contentArray = content.match(/<h1>.*?<\/h1>|<p>.*?<\/p>|<img.*?\/>/g);

        const contentContainer = document.getElementById('content-container');

        let i=0;
        while(i<contentArray.length){
            if(contentArray[i].includes('<h1>')){
                // setup section
                const section = document.createElement("div");
                section.classList.add("w-full");
                // h1 value
                const h1Content=contentArray[i].replaceAll(/<h1>|<\/h1>/g,'');
                const title=createTitle(h1Content);
                section.append(title);

                if(contentArray[i+1].includes('<p>'))
                {
                    // paragraph value
                    let paragraphContent=contentArray[i+1].replaceAll(/<p>|<\/p>/g,'');
                    const paragraph=createParagraph(paragraphContent);
                    section.append(paragraph);
                    i=i+2;
                }
                else
                {
                   const paragraph=createParagraph();
                    section.append(paragraph);
                    i=i+1;
                }

                // append section that contains h1 and p
                contentContainer.append(section);
                
            }
            else if(contentArray[i].includes('<p>')){
                // setup section
                const section = document.createElement("div");
                section.classList.add("w-full");
                // create empty input title
                const title=createTitle();
                section.append(title);

                let paragraphContent=contentArray[i+1].replaceAll(/<h1>|<\/h1>/g,'');
                const paragraph=createParagraph(paragraphContent);
                section.append(paragraph);
                i=i+1;

                // append section that contains h1 and p
                contentContainer.append(section);
            }
            else if(contentArray[i].includes('<img')){

            }
        }
    }

    window.onload=()=>{
        setupEditForm();
    };

    // addInputSection
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
        function createCloseContentSectionButton(){
            const btnDiv = document.createElement("div");
            const closeBtn = document.createElement("button");
            btnDiv.classList.add('flex');
            btnDiv.classList.add('w-full');
            btnDiv.classList.add('justify-end');
            closeBtn.innerHTML='×';
            closeBtn.type="button";
            closeBtn.addEventListener('click',function click(){
                removeInputSection(this);
            });
            btnDiv.append(closeBtn);
            return btnDiv;
        }
        function createTitle(value){
            const div = document.createElement("div");
            const btnDiv=createCloseContentSectionButton();
            div.append(btnDiv);
            const titleGroup = document.createElement("div");
            titleGroup.classList.add("flex");
            const label= document.createElement("label");
            label.classList.add("text-lg");
            let id=getTitleId();
            label.for=id;
            label.innerText="Title:";
            const input = document.createElement('input');
            input.type="text";
            input.name=id;
            input.classList.add('field');
            input.classList.add("title");
            input.classList.add("flex-1");
            input.classList.add("border-b-2");
            if(value){
                input.value=value;
            }
            titleGroup.append(label);
            titleGroup.append(input);
            div.append(titleGroup);
            return div;
        }
        function createParagraph(value){
            const div = document.createElement("div");
            div.innerHTML=`
                <div class="relative mb-5">
                    <label class="text-lg">Paragraph</label>
                    <textarea class="w-full paragraph border-2 field" placeholder="Type Here!!!" rows="10"></textarea>
                    <div class="absolute right-0">
                        <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
                        <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph" />
                    </div>
                </div>
            `;
            if(value){
                div.children[0].childNodes[3].innerHTML=value;
                // alert(div.children[0].childNodes[3].className);
            }
            return div;
        }
        function removeInputSection(button){
            button.parentElement.parentElement.parentElement.remove();
        }
    // end of addInputSection

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // addImageSection
    function addImageSection(button){
        alert('imageSection');
        const imageDivSection=createImageDrop();
        const topLevelParent=button.parentElement.parentElement;
        topLevelParent.parentElement.insertBefore(imageDivSection,topLevelParent.nextSibling);
    }
    function createImageDrop(){
        const closeBtn=createCloseImageSectionButton();
        const div = document.createElement("div");
        div.classList.add('w-full');
        const label = document.createElement("label");
        const inputFile = document.createElement("input");
        inputFile.type="file";
        setImageInputFields(inputFile);

        inputFile.addEventListener('change', function onChange(){
            setFilePath(this);
        });
        
        const imageInputContainer = document.createElement("div");
        imageInputContainer.classList.add('w-full');
        imageInputContainer.classList.add('flex');
        // input container
        const inputContainer = document.createElement("div");
        inputContainer.append(label);
        inputContainer.append(inputFile);
        imageInputContainer.innerHTML=inputContainer.innerHTML;

        // image container
        // const imageContainer = document.createElement("div");
        const image = document.createElement("img");
        image.src="https://picsum.photos/200/300";

        imageInputContainer.append(image);

        div.append(closeBtn);
        div.append(imageInputContainer);
        // div.append(label);
        // div.append(inputFile);

        const addSectionGroup = document.createElement("div");
        addSectionGroup.classList.add('relative');
        addSectionGroup.classList.add('right-0');
        addSectionGroup.innerHTML=`<input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph" />`;
        div.append(addSectionGroup);
        return div;
    }
    function setImageInputFields(inputFile){
        if(hasValidFileId()){
            let inputFileId=getValidFileId();
            inputFile.id="image"+inputFileId;
            inputFile.name="image"+inputFileId;
            inputFile.classList.add('image');
            inputFile.classList.add('field');
        }
    }
    function createCloseImageSectionButton(){
        const btnDiv = document.createElement("div");
        const closeBtn = document.createElement("button");
        btnDiv.classList.add('flex');
        btnDiv.classList.add('w-full');
        btnDiv.classList.add('justify-end');
        closeBtn.innerHTML='×';
        closeBtn.type="button";
        closeBtn.addEventListener('click',function click(){
            removeImageSection(this);
        });
        btnDiv.append(closeBtn);
        return btnDiv;
    }
    function removeImageSection(button){
        button.parentElement.parentElement.remove();
    }
    // end addImageSection
    const file =[
        {
            fileId:1,
            filePath:null
        },
        {
            fileId:2,
            filePath:null
        },
        {
            fileId:3,
            filePath:null
        },
        {
            fileId:4,
            filePath:null
        },
        {
            fileId:5,
            filePath:null
        },
    ];
    function hasValidFileId(){
        for(let i=0; i<file.length;i++){
            if(file[i].filePath==null){
                return true;
            }
        }
        return false;
    }
    function setFileId(path){
        for(let i=0; i<file.length;i++){
            if(file[i].filePath==null){
                file[i].filePath=path;
            }
        }
    }
    function getValidFileId(){
        for(let i=0; i<file.length;i++){
            if(file[i].filePath==null){
                return file[i].fileId;
            }
        }
    }

    function setFilePath(inputFile,imagePreview){
        alert('trigger');
        var reader  = new FileReader();

        reader.onloadend = function () {
            // let imagePreview=document.getElementById('demoImg');
            imagePreview.src = reader.result;
        }
        if(inputFile.files && inputFile.files[0]){
            reader.readAsDataURL(inputFile.files[0]);
        }
    }

    function back(){
        const form =document.getElementById('create-form');
        const prevCreate=document.getElementById('preview-create');
        prevCreate.classList.remove('block');
        prevCreate.classList.add('hidden');
        form.classList.remove('hidden');
        const paragraphContainer=document.getElementById('preview-field-container');
        paragraphContainer.innerHTML="";
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

        // add paragraphs to preview-field-container
        const fieldContainer=document.getElementById('preview-field-container');
        const fields=document.getElementsByClassName('field');
        for(let i=0;i<=fields.length;i++){
            if(fields[i].classList.contains('title')){
                const heading = document.createElement("h1");
                heading.innerHTML=fields[i].value;
                fieldContainer.append(heading);
                alert('title it is');
            }
            if(fields[i].classList.contains('paragraph')){
                const paragraph = document.createElement("p");
                paragraph.innerHTML=fields[i].value;
                fieldContainer.append(paragraph);
                alert('paragraph it is');
            }
            if(fields[i].classList.contains('image')){
                const img = document.createElement("img");
                setFilePath(fields[i],img);
                fieldContainer.append(img);
                alert('image it is');
            }
        }
    }

</script>


