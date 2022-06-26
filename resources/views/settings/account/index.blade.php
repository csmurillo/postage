@extends('layouts.app')

@section('content')
<div class="px-10 md:px-48">
    <h1 class="text-3xl mb-10">Account Details</h1>
    <form>
        <div class="flex mb-4 gap-2">
            <label for="fname" class="text-xl">First Name:</label>
            <input name="fname" type="text" class="border flex-1 text-xl" value="{{Auth::user()->firstname}}"/>
        </div>
        <div class="flex mb-4 gap-2">
            <label for="lname" class="text-xl">Last Name:</label>
            <input name="lname" type="text" class="border flex-1 text-xl" value="{{Auth::user()->lastname}}"/>
        </div>
        <div class="flex mb-4 gap-2">
            <label for="username" class="text-xl">Username:</label>
            <input name="username" type="text" class="border flex-1 text-xl" value="{{Auth::user()->username}}"/>
        </div>
        <div class="flex mb-4 gap-2">
            <label for="email" class="text-xl">Email:</label>
            <input name="email" type="email" class="border flex-1 text-xl" value="{{Auth::user()->email}}"/>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="border px-4 py-2 rounded text-xl">Update</button>
        </div>
    </form>
</div>

@endsection
