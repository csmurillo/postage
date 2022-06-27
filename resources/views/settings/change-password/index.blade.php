@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div>
        <h1 class="text-3xl mb-10">Update Password</h1>
        <form method="POST" action="/updatepassword/{{ Auth::user()->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="flex w-full gap-2 mb-5">
                    <label for="password" class="text-xl md:text-2xl">Password:</label>

                    <div class="flex-1 border-2">
                        <input id="password" type="password" class="w-full text-xl md:text-2xl @error('password') border-red-500 @enderror" name="password"  autocomplete="new-password">

                        @error('password')
                            <span class="text-red-500">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex w-full gap-2 mb-5">
                    <label for="password-confirm" class="text-xl md:text-2xl">Retype Password:</label>

                    <div class="flex-1 border-2">
                        <input id="password-confirm" type="password" class="w-full text-xl md:text-2xl" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>

                <div class="w-full flex justify-center">
                    <button type="submit" class="border bg-blue-500 px-4 py-2 text-white rounded-lg text-xl md:text-2xl">
                        Update Password
                    </button>
                </div>

            {{--  --}}
        </form>
    </div>
</div>

@endsection
