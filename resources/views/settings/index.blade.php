@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-4 md:px-20 lg:px-20 sm:grid sm:grid-cols-3 sm:gap-4 mx-10 grid grid-cols-2 gap-4">
    <a class="flex-1 p-4 sm:p-5 rounded-lg border-4 hover:cursor-pointer" href="{{ url('/account') }}">
        <div class="h-32 flex justify-center">
            <x-css-profile class="h-24 w-24 text-slate-400"/>
        </div>
        <h1 class="text-lg flex justify-center">Account</h1>
    </a>
    <a class="flex-1 p-4 sm:p-5 rounded-lg border-4 hover:cursor-pointer" href="{{ url('/changePassword') }}">
        <div class="h-32 flex justify-center">
            <x-css-password class="h-24 w-24 text-slate-400"/>
        </div>
        <h1 class="text-lg flex justify-center text-center">Change Password</h1>
    </a>
    <a class="flex-1 p-4 sm:p-5 rounded-lg border-4 hover:cursor-pointer" href="{{ url('/deleteAccount') }}">
        <div class="h-32 flex justify-center">
            <x-uiw-user-delete class="h-24 w-24 text-slate-400"/>
        </div>
        <h1 class="text-lg flex justify-center">Delete Account</h1>
    </a>
</div>
@endsection



