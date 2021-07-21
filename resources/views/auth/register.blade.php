@extends('layouts.app')

@section('content')

   <div class="register_section">

        <div class="flex justify-center">

            <div class="w-4/12 rounded-lg bg-white p-6">
                <h5 class="flex items-center justify-center mb-3">Create an Account Here</h5>

                <form action="{{ route('register') }}" method="post">
                   @csrf
                   <div class="mb-4">
                       <label for="name" class="sr-only">Name:</label>
                       <input type="text" name="name" class="bg-gray-100 p-2 w-full border-2 rounded-lg @error('name') border-red-500 @enderror" placeholder="Tap your name..." value="{{ old('name') }}">

                      @error('name')

                      <div class="text-red-500">
                          {{ $message }}
                      </div>

                      @enderror

                   </div>


                   <div class="mb-4">
                       <label for="username" class="sr-only">Username:</label>
                       <input type="text" name="username" class="bg-gray-100 border-2 p-2 w-full rounded-lg @error('username') border-red-500 @enderror" placeholder="Tap your username..." value="{{ old('username') }}">

                       @error('username')

                        <div class="text-red-500">
                            {{$message}}
                        </div>

                       @enderror

                   </div>

                   <div class="mb-4">
                       <label for="email" class="sr-only">Email:</label>
                       <input type="email" name="email" class="bg-gray-100 border-2 p-2 w-full rounded-lg @error('email') border-red-500 @enderror" placeholder="Tap your email..." value="{{ old('email') }}">

                       @error('email')
                        <div class="text-red-500">
                            {{$message}}
                        </div>

                       @enderror
                   </div>

                   <div class="mb-4">
                       <label for="password" class="sr-only">Password:</label>
                       <input type="password" name="password" class="bg-gray-100 border-2 p-2 w-full rounded-lg @error('password') border-red-500 @enderror" placeholder="Tap your password..." value="{{ old('password') }}">

                       @error('password')

                        <div class="text-red-500">
                            {{$message}}
                        </div>

                       @enderror
                   </div>

                   <div class="mb-4">
                       <label for="password_confirmation" class="sr-only">Password Confirmation:</label>
                       <input type="password" name="password_confirmation" class="bg-gray-100 p-2 w-full border-2 rounded-lg @error('password_confirmation') border-red-500 @enderror" placeholder="Confirm your password..." value="{{ old('password_confirmation') }}">

                       @error('password_confirmation')

                        <div class="text-red-500">
                            {{$message}}
                        </div>

                       @enderror
                   </div>

                   <button type="submit" class="bg-blue-500 text-white w-full rounded px-4 py-3 font-medium">Register</button>
                </form>


            </div>

        </div>

   </div>

@stop
