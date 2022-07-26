@extends('layouts.app')

@section('content')
<div class="">
    <div class="flex justify-center items-center">
        <div class="w-72">
            <h1 class="text-4xl mb-6">{{ __('Login') }}</h1>
            <div class="">
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div>
                            <input id="email" type="email" class="border-2 rounded w-full form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <input id="password" type="password" class="border-2 rounded w-full form-control" name="password" autocomplete="current-password">
                            @error('password')
                                <span role="alert" class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full flex justify-center">
                        <button type="submit" class="btn bg-blue-500 p-2 text-white rounded">
                            {{ __('Login') }}
                        </button>
                    </div>
                    {{-- <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
