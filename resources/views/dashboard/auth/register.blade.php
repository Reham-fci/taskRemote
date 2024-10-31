@extends('dashboard.layouts.auth.app')
@include('dashboard.layouts.shared/title-meta', ['title' => "Register"])
@section('content')
    <div class="h-screen w-screen flex justify-center items-center">

        <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">

            <div class="card overflow-hidden sm:rounded-md rounded-none">

                <div class="p-6">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                    <a href="{{ route('any', 'index') }}}" class="block mb-8">
                        <img class="h-6 block dark:hidden" src="/images/logo-dark.png" alt="">
                        <img class="h-6 hidden dark:block" src="/images/logo-light.png" alt="">
                    </a>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                               for="LoggingEmailAddress">Full Name</label>
                        <input id="LoggingEmailAddress" class="form-input" name="name"  value="{{old('name')}}" placeholder="Enter your Name">
                        @error('name')
                         <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                               for="LoggingEmailAddress">Email Address</label>
                        <input id="LoggingEmailAddress" class="form-input" type="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                               for="loggingPassword">Password</label>
                        <input id="loggingPassword" class="form-input" name="password" type="password"
                               placeholder="Enter your password" value="{{old('password')}}" >
                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                   for="password_confirmation">Confirmation Password</label>
                            <input id="password_confirmation" class="form-input" name="password_confirmation" type="password"
                                   placeholder="Enter your password" value="{{old('Confirm Password')}}">
                            @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                    <div class="flex justify-center mb-6">
                        <button class="btn w-full text-white bg-primary" type="submit"> Register</button>
                    </div>

            </form>

                    <p class="text-gray-500 dark:text-gray-400 text-center">Already have account ?<a
                            href="{{ route('admin.login') }}" class="text-primary ms-1"><b>Log In</b></a>
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
