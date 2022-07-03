@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <h1 class="text-3xl md:text-4xl mb-10">Delete Account</h1>
    <form action="/user/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit" class="border px-4 py-2 rounded text-xl md:text-2xl">Delete</button>
        </div>
    </form>
</div>

@endsection
