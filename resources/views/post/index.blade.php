@extends('layouts.app')

@section('content')
<div class="h-full px-2 sm:px-4 md:px-28 flex flex-col">
    <h1 class="text-4xl mb-4">Dashboard</h1>
    {{-- <div class="w-full flex-1 flex justify-center items-center">
        <p class="text-3xl">No Posts</p>
    </div> --}}
    <div class="sm:grid md:grid-cols-3 sm:grid-cols-2 gap-4">
        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="rounded-t-sm w-full h-full" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>

        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>

        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>
        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>

        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>

        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>
        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>

        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>

        <div class="card flex flex-col">
            <div class="relative h-48">
                <img class="w-full h-full rounded-t-sm" src="{{asset('images/dogecoin.jpg')}}" height="0px" width="0px" />
            </div>
            <div>
                <p class="text-lg ml-2 py-2">Dogecoin</p>
            </div>
        </div>
    </div>
</div>


<div class="hidden sm:block absolute h-full w-full top-0">
    <button class="fixed bottom-20 right-20 rounded-md border bg-blue-500 px-5 py-2 text-white text-xl">Add Post +</button>
</div>

<div class="block sm:hidden absolute h-20 w-full bottom-0">
    <button class="fixed border bg-blue-500 text-white text-xl w-full h-20">Add Post +</button>
</div>
@endsection

