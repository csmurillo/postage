@extends('layouts.app')

@section('content')

<div class="px-10 md:px-48">
    <h1 class="text-3xl mb-10">Update Password</h1>
    <form>
        <div class="flex mb-4 gap-2">
            <label for="fname" class="text-xl">Password:</label>
            <input name="fname" type="text" class="border flex-1 text-xl"/>
        </div>
        <div class="flex mb-4 gap-2">
            <label for="lname" class="text-xl">Retype Password:</label>
            <input name="lname" type="text" class="border flex-1 text-xl"/>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="border px-4 py-2 rounded-xl text-xl">Update Password</button>
        </div>
    </form>
</div>

@endsection
