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


<script src="{{ asset('js/posts/edit/index.js') }}"></script>
<script src="{{ asset('js/posts/inputManager.js') }}"></script>
<script src="{{ asset('js/posts/setImageSection.js') }}"></script>
<script src="{{ asset('js/posts/setInputSection.js') }}"></script>
<script src="{{ asset('js/posts/setEditImageSection.js') }}"></script>
<script src="{{ asset('js/posts/setEditInputSection.js') }}"></script>
<script src="{{ asset('js/posts/previewPost.js') }}"></script>

@endsection

<script>
    window.onload=()=>{
        setupEditForm();
    };
    function setupEditForm(){
        var content = {!! json_encode($post['content']) !!};    
        var contentArray = content.match(/<h1>.*?<\/h1>|<p>.*?<\/p>|<p>.*?(\r\n|\r|\n).*?<\/p>|<img.*?\/>/g);
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
    
</script>