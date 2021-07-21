@extends('layouts.app')

@section('content')

   <div class="login_section">

        <div class="flex justify-center mb-3">

            <div class="w-4/12 rounded-lg bg-white p-6">
                <h5 class="flex items-center justify-center mb-3">Sign in</h5>

                @if(session('status'))

                    <div class="bg-red-500 mb-3 rounded-lg border text-white w-full p-2 text-center ">
                        {{session('status')}}
                    </div>

                @endif

                <form action="{{ route('login')}}" method="post">
                   @csrf
                   <div class="mb-4">
                       <label for="email" class="sr-only">Email:</label>
                       <input type="email" name="email" class="bg-gray-100 p-2 w-full border-2 rounded-lg @error('email') border-red-500 @enderror" placeholder="Tap your name..." value="{{ old('email') }}">

                      @error('email')

                      <div class="text-red-500">
                          {{ $message }}
                      </div>

                      @enderror

                   </div>


                   <div class="mb-4">
                       <label for="password" class="sr-only">Password:</label>
                       <input type="password" name="password" class="bg-gray-100 border-2 p-2 w-full rounded-lg @error('password') border-red-500 @enderror" placeholder="Tap your username...">

                       @error('username')

                        <div class="text-red-500">
                            {{$message}}
                        </div>

                       @enderror

                   </div>

                   <div class="mb-4">

                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>

                    </div>

                   <button type="submit" class="bg-green-300 text-white w-full rounded px-4 py-3 font-medium">Login</button>
                </form>


            </div>

        </div>

   </div>

@stop
