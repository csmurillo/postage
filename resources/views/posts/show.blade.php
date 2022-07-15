@extends('layouts.app')

@section('content')
<div class="px-96 pt-2 h-full">
    <div class="flex flex-col h-full justify-between">
        <div class="flex-1">
            <h1 class="text-3xl underline">{{ucfirst($post->title)}}</h1>
            <div id="content-container">
                
            </div>
        </div>
        <div class="border-l-4 border-blue-500 pl-2">
            <p class="text-lg font-Rajdhani">Author</p>
            <p>{{ucfirst($post->user->username)}}</p>
        </div>
    </div>
</div>

<script>
    window.onload=()=>{
        setupContentShow();
    };
    // TODO::duplicate from edit change later
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
    }
    function setupContentShow(){
        const contentContainer = document.getElementById('content-container');
        var content = {!! json_encode($post['content']) !!};    
        var contentArray = content.match(/<h1>.*?<\/h1>|<p>.*?<\/p>|<img.*?\/>/g);
        let i=0;
        while(i<contentArray.length){
            if(contentArray[i].includes('<h1>')){
                const h1Content=contentArray[i].replaceAll(/<h1>|<\/h1>/g,'');
                let h1=document.createElement('h1');
                h1.innerHTML=h1Content;
                h1.classList.add('underline');
                h1.classList.add('text-xl');
                h1.classList.add('mb-2');
                contentContainer.append(h1);
            }
            else if(contentArray[i].includes('<p>')){
                const pContent=contentArray[i].replaceAll(/<p>|<\/p>/g,'');
                let p=document.createElement('p');
                p.innerHTML=pContent;
                p.classList.add('text-lg');
                p.classList.add('mb-2');
                contentContainer.append(p);
            }
            else if(contentArray[i].includes('<img')){
                let imageId=contentArray[i].replaceAll(/<img|\/>/g,'').toString().replaceAll(/id="|"/g,'').trim();
                let imageSrc=getImageUrl(imageId);
                let img=document.createElement('img');
                img.classList.add('h-72');
                img.classList.add('w-full');
                img.classList.add('mb-2');
                img.src='/storage/'+imageSrc;
                contentContainer.append(img);
            }
            i++;
        }
    }
</script>

@endsection


