@extends('layouts.app')

@section('content')
<main class="lg:mx-48 mx-10 flex flex-col">
    <div class="flex">
        <div class="flex flex-col">
            {{-- <div class="md:h-48"> --}}
                <x-ri-account-circle-line class="h-24 w-24 md:h-48 md:w-48 text-slate-400"/>
            {{-- </div> --}}
            <p class="text-center">
                Name
            </p>
        </div>
        <div class="flex-1 md:pl-5 md:pt-5 bg-cyan-700">
            About
        </div>
    </div>
    <div class="flex-1 flex flex-col pt-5 border">
        <h1 class="text-2xl lg:text-3xl">Recently Created</h1>
        <p class="flex-1 text-xl text-center italic">
            No Posts
        </p>
    </div>
</main>
@endsection




