@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-4 md:px-20 lg:px-60">
    <h1 class="text-3xl mb-5">Team</h1>
    <div class="flex">
        <div class="flex flex-col">
            <x-ri-account-circle-line class="h-24 w-24 md:h-48 md:w-48 text-slate-400"/>
            <p class="text-center text-3xl">Angel Murillo</p>
        </div>
        <div class="flex items-center justify-center">
            <p class="px-32 text-2xl">Hello I am the CEO of the POSTAGE company, my mission is to make internet articles easier for any user to read. Without the hassle 
                of logging into a website.
            </p>
        </div>
    </div>
</div>
@endsection