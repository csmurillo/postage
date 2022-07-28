@extends('layouts.app')

@section('content')
<main class="lg:mx-48 mx-10 flex flex-col">
    <div class="flex">
        <div class="flex flex-col">
            <x-ri-account-circle-line class="h-24 w-24 md:h-48 md:w-48 text-slate-400"/>
            <p class="text-center">{{Auth::user()->username}}</p>
        </div>
        <div class="relative flex-1 flex flex-col pl-2 pt-2 md:pl-5 md:pt-5">
            <div class="absolute right-2 top-2 cursor-pointer sm:right-4 sm:top-4" onclick="editDescription()">
                <x-feathericon-edit class="w-4 h-4 sm:w-6 sm:h-6" />
            </div>
            <p class="text-xl">About</p>
            <p id="description-value" class="flex">{{Auth::user()->profile->description}}</p>
            <form id="update-description" class="hidden flex-1 flex-col" action="/profile/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <textarea id="description" name="description" class="flex-1" style="resize:none">{{Auth::user()->profile->description ?? ''}}</textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </div>
    <div class="flex-1 flex flex-col pt-5">
        <h1 class="text-2xl lg:text-3xl">Recently Created</h1>
        {{-- <p class="flex-1 text-xl text-center italic"> --}}
            <div class="sm:grid md:grid-cols-3 sm:grid-cols-2 flex flex-col gap-4">
            {{-- No Posts --}}
            @foreach($posts as $post)
                {{-- card --}}
                <x-card :post="$post"></x-card>
            @endforeach
            </div>
        {{-- </p> --}}
    </div>
</main>
<script>
    function editDescription(){
        const description=document.getElementById('description-value');
        const updateDescription=document.getElementById('update-description');

        if(description.classList.contains('hidden')){
            description.classList.remove('hidden');
            description.classList.add('flex');
            updateDescription.classList.remove('flex');
            updateDescription.classList.add('hidden');
        }
        else{
            description.classList.remove('flex');
            description.classList.add('hidden');
            updateDescription.classList.remove('hidden');
            updateDescription.classList.add('flex');
            updateDescription.classList.add('flex-col');
            updateDescription.classList.add('justify-between');
        }
    }
</script>

@endsection










