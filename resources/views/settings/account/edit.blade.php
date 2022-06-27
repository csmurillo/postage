@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div>
        <h1 class="text-3xl md:text-4xl mb-10">Account Details</h1>
        <form action="/user/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <div class="flex mb-4 gap-2">
                <label for="firstname" class="text-xl md:text-2xl">First Name:</label>
                <input id="firstname" name="firstname" type="text" class="border flex-1 text-xl md:text-2xl" value="{{old('firstname')?old('firstname'):Auth::user()->firstname}}"/>
                @if ($errors->has('firstname'))
                    <span class="text-red-500">
                        <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex mb-4 gap-2">
                <label for="lastname" class="text-xl md:text-2xl">Last Name:</label>
                <input id="lastname" name="lastname" type="text" class="border flex-1 text-xl md:text-2xl" value="{{old('lastname')?old('lastname'):Auth::user()->lastname}}"/>
                @if ($errors->has('lastname'))
                    <span class="text-red-500">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex mb-4 gap-2">
                <label for="username" class="text-xl md:text-2xl">Username:</label>
                <input id="username" name="username" type="text" class="border flex-1 text-xl md:text-2xl" value="{{old('username')?old('username'):Auth::user()->username}}"/>
                @if ($errors->has('username'))
                    <span class="text-red-500">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex mb-4 gap-2">
                <label for="email" class="text-xl md:text-2xl">Email:</label>
                <input id="email" name="email" type="email" class="border flex-1 text-xl md:text-2xl" value="{{old('email')?old('email'):Auth::user()->email}}"/>
                @if ($errors->has('email'))
                    <span class="text-red-500">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex justify-center">
                <button type="submit" class="border px-4 py-2 rounded text-xl md:text-2xl">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
