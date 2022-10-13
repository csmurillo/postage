@props(['post'])
<div class="card relative flex flex-col z-[1] group hover:cursor-pointer" onclick="@if (str_contains(url()->current(), '/dashboard')) cardClick(event,'/post/{{$post->id}}');@else window.location.href = window.location.origin+'/post/{{$post->id}}'  @endif">
    <div class="absolute top-0 right-1 z-[10]">
        <div class="absolute top-0 right-0 border-2 border-gray-100 rounded mt-2 mr-2 cursor-pointer">
            @if (url()->current() == 'http://postage-app.herokuapp.com/dashboard')
            <div id="three-dots-container" class="threedots disabled:group" onclick="editDropdown(this)" onmouseover="this.parentElement.parentElement.parentElement.classList.remove('group')" onmouseout="this.parentElement.parentElement.parentElement.classList.add('group')">
                <x-bi-three-dots id="three-dots" class="text-white w-6 h-6" onclick="editDropdown(this)" />
            </div>
            <div class="hidden z-[999999]">
                <div class="absolute bg-white px-4 -ml-14 mt-[3px] rounded" onclick="">
                    <div class="border-b-2">
                        <a class="text-black text-lg" href="/post/{{$post->id}}/edit">Edit</a>
                    </div>
                    <div>
                        <form id="form" action="/post/{{$post->id}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-black text-lg">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="relative h-48">
        <img class="rounded-t-sm w-full h-full" src="{{$post->image ? asset('storage/' . $post->image) : asset('images/defaultImage.png') }}"
         height="0px" width="0px" />
    </div>
    <div class="flex justify-between">
        <p class="text-xl ml-2 py-2">{{$post['title']}}</p>
        <div class="text-xl mr-2 py-2 hidden group-hover:text-blue-400 group-hover:block">
            <x-css-eye />
        </div>
    </div>
</div>

<script>
    function cardClick(event,urlDirect){
        // alert(event.target)
        var postId = {!! json_encode($post->id) !!};
        if(event.target.toString()=='[object SVGSVGElement]'||event.target.toString()=='[object SVGPathElement]'){
            event.preventDefault();
        }
        else{
            // alert('URL');
            // alert(urlDirect);
            window.location.href = window.location.origin+urlDirect;
        }
        // window.location.href = window.location.origin+'/post/{{$post->id}}';
    }

    function handleThreeDotsOutsideClick(e){
        let threeDots=document.getElementsByClassName('threedots');
        let target=e.target;
        for(let i=0; i<threeDots.length;i++){
            const threeDotsMasterParent=threeDots[i].parentElement;
            if(threeDotsMasterParent.contains(target)){
                // alert('will not vanish');
            }
            else{
                // alert('will vanish');
                threeDots[i].nextElementSibling.classList.remove('flex');
                threeDots[i].nextElementSibling.classList.add('hidden');
            }
        }
        
    }

    function editDropdown(threeDots){
        // show edit/delete
        if(threeDots.nextElementSibling.classList.contains('hidden')){
            threeDots.nextElementSibling.classList.remove('hidden');
            threeDots.nextElementSibling.classList.add('flex');
            window.addEventListener('click',handleThreeDotsOutsideClick);
        }
        // hide edit/delete
        else{
            threeDots.nextElementSibling.classList.remove('flex');
            threeDots.nextElementSibling.classList.add('hidden');
            window.removeEventListener('click',handleThreeDotsOutsideClick);
        }
    }
</script>



