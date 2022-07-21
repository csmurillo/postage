@extends('layouts.app')

@section('content')
<div class="h-full px-4 sm:px-4 md:px-20 lg:px-20 flex flex-col pb-20 sm:pb-0">
    <h1 class="text-4xl mb-4">Dashboard</h1>
    {{-- <div class="w-full flex-1 flex justify-center items-center">
        <p class="text-3xl">No Posts</p>
    </div> --}}
    <div class="sm:grid md:grid-cols-3 sm:grid-cols-2 gap-4 flex-col space-y-6 sm:space-y-0">
        @foreach($posts as $post)
            {{-- card --}}
            <x-card :post="$post"></x-card>
        @endforeach
    </div>
</div>

{{-- tablet/desktop --}}
<div class="hidden sm:block absolute h-full w-full top-0">
    <button class="fixed bottom-10 right-10 md:bottom-28 md:right-28 rounded-md border bg-blue-500 px-5 py-2 text-white text-2xl z-[100]" type="button" onclick="window.location='{{ url('/post/create') }}'">Add Post +</button>
</div>

{{-- mobile --}}
<div class="block sm:hidden absolute h-20 w-full bottom-0 z-[9999]">
    <button class="fixed border bg-blue-500 text-white text-2xl w-full h-20" type="button" onclick="window.location='{{ url('/post/create') }}'">Add Post +</button>
</div>

@endsection




