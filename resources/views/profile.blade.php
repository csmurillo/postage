@extends('layouts.app')

@section('content')
<main class="lg:mx-48 mx-10 flex flex-col">
    <div class="flex">
        <div class="flex flex-col">
            <x-ri-account-circle-line class="h-24 w-24 md:h-48 md:w-48 text-slate-400"/>
            <p class="text-center text-2xl">
                {{$user->firstname}}
            </p>
        </div>
        <div class="relative flex-1 flex flex-col pl-2 pt-2 md:pl-5 md:pt-5">
            <p class="text-xl">About</p>
            <p id="description-value" class="flex">{{$user->profile->description}}</p>
            <form id="update-description" class="hidden flex-1 flex-col" action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <textarea id="description" name="description" class="flex-1" style="resize:none">{{$user->profile->description ?? ''}}</textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </div>
    <div class="flex-1 flex flex-col pt-5">
        <h1 class="text-2xl lg:text-3xl">All Posts</h1>
        {{-- <p class="flex-1 text-xl text-center italic">
            No Posts
        </p> --}}
        <div class="sm:grid md:grid-cols-3 sm:grid-cols-2 gap-4 flex-col space-y-6 sm:space-y-0">
            @foreach($posts as $post)
                {{-- card --}}
                <x-card :post="$post"></x-card>
            @endforeach
        </div>
    </div>
</main>


@endsection










