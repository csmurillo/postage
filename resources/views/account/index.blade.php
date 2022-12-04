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
            <p id="description-value" class="flex">{{Auth::user()->profile->description ?? ''}}</p>
            <form id="update-description" class="hidden flex-1 flex-col" action="/profile/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <textarea id="description" name="description" class="flex-1" style="resize:none">{{Auth::user()->profile->description ?? ''}}</textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </div>
    <div class="flex-1 flex flex-col pt-5">
        <h1 class="text-2xl lg:text-3xl mb-2">Recently Created</h1>
        @if (count($posts)>0)
            <div class="sm:grid md:grid-cols-3 sm:grid-cols-2 flex flex-col gap-4">
                @foreach($posts as $post)
                    {{-- card --}}
                    <x-card :post="$post"></x-card>
                @endforeach
            </div>
        @else
            <p class="w-full text-center text-xl py-10">No Posts</p>
        @endif
    </div>
</main>
<script src="{{ asset('js/home/index.js') }}"></script>
@endsection










