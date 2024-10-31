@extends('dashboard.layouts.auth.app')
@include('dashboard.layouts.shared/title-meta', ['title' => "Login"])
@section('content')
    <div class="h-screen w-screen flex justify-center items-center">

        <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
            <div class="card overflow-hidden sm:rounded-md rounded-none">
                <div class="p-6">
                    <a href="{{ route('any', 'index') }}" class="block mb-8">
                        <img class="h-6 block dark:hidden" src="/images/logo-dark.png" alt="">
                        <img class="h-6 hidden dark:block" src="/images/logo-light.png" alt="">
                    </a>

                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                   for="LoggingEmailAddress">Email Address</label>
                            <input id="LoggingEmailAddress" class="form-input" type="email"
                                   placeholder="Enter your email" name="email" value="{{old('email')}}">
                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                   for="loggingPassword">Password</label>
                            <input id="loggingPassword" class="form-input" type="password"
                                   placeholder="Enter your password" name="password" value="{{old('password')}}">
                            @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                                <label class="ms-2" for="checkbox-signin">Remember me</label>
                            </div>
                            <a href="{{ route('admin.forget-password') }}"
                               class="text-sm text-primary border-b border-dashed border-primary">Forget Password ?</a>
                        </div>

                        <div class="flex justify-center mb-6">
                            <button class="btn w-full text-white bg-primary"> Log In</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
