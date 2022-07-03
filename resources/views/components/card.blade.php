@props(['post'])
<div class="card flex flex-col">
    <div class="relative h-48">
        <div class="absolute top-0 right-0 border-2 border-gray-100 rounded mt-2 mr-2 cursor-pointer z-50">
            <div onclick="editDropdown(this)">
                <x-bi-three-dots class="text-white w-6 h-6" />
            </div>
            <div class="hidden">
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
        </div>
        <img class="rounded-t-sm w-full h-full" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
    </div>
    <div>
        <p class="text-lg ml-2 py-2">{{$post['title']}}</p>
    </div>
</div>

<script>
    function editDropdown(threeDots){
        if(threeDots.nextElementSibling.classList.contains('hidden')){
            threeDots.nextElementSibling.classList.remove('hidden');
            threeDots.nextElementSibling.classList.add('flex');
        }
        else{
            threeDots.nextElementSibling.classList.remove('flex');
            threeDots.nextElementSibling.classList.add('hidden');
        }
    }
</script>


