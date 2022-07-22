@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-4 md:px-20 lg:px-60">
    <h1 class="text-3xl mb-5">Careers</h1>
    <div class="w-full flex mb-6">
        <label class="bg-blue-700 rounded-l-lg p-2 text-white">Search</label>
        <input class="border flex-1" type="text"/>
        <button class="bg-blue-500 rounded-r-lg p-2 text-white" type="button">Go</button>
    </div>
    <div class="text-center">
        <p class="text-2xl">No Jobs</p>
    </div>
</div>
@endsection