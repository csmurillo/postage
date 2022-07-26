@extends('layouts.app')

@section('content')
<div class="">
    <div class="flex justify-center items-center">
        <div class="w-72">
            <h1 class="text-4xl mb-6">{{ __('Register') }}</h1>
            <div class="">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-2">
                        <label for="firstname" class="col-md-4 col-form-label text-md-end">First Name:</label>
                        <div>
                            <input id="firstname" type="text" class="border-2 rounded w-full form-control" name="firstname" value="{{ old('firstname') }}"  autocomplete="firstname" autofocus>
                            @error('firstname')
                                <span role="alert" class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="lastname" class="col-md-4 col-form-label text-md-end">Last Name:</label>
                        <div>
                            <input id="firstname" type="text" class="border-2 rounded w-full form-control" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>
                            @error('lastname')
                                <span role="alert" class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="username" class="col-md-4 col-form-label text-md-end">User Name:</label>
                        <div>
                            <input id="username" type="text" class="border-2 rounded w-full form-control" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>
                            @error('username')
                                <span role="alert" class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div>
                            <input id="email" type="text" class="border-2 rounded w-full form-control" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                            @error('email')
                                <span role="alert" class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="border-2 rounded w-full form-control" name="password" autocomplete="new-password">
                            @error('password')
                                <span role="alert" class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="border-2 rounded w-full form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="w-full flex justify-center">
                        <button type="submit" class="btn bg-blue-500 p-2 text-white rounded">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
