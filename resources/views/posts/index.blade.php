@extends('layouts.app')

@section('content')

   <div class="posts">

        <div class="flex justify-center">

            <div class="w-8/12 rounded-lg bg-white p-6">

                @if(session('success'))
                     <div class="text-green-200 mb-2">
                         {{session('success')}}
                     </div>

                @endif

                <div class="mb-2">

                    <form action="" method="post" class="mb-4">
                        @csrf

                        <div class="mb-4">
                            <label for="posts" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" value="{{ old('body') }}" placeholder="Post Something" class="bg-gray-100 @error('body') border-red-500 @enderror rounded-lg p-3 w-full "></textarea>

                            @error('body')

                                <div class="text-red-500">
                                    {{$message}}
                                </div>

                            @enderror
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="bg-purple-400 font-medium text-white px-4 py-3 rounded border">Post</button>
                        </div>

                    </form>

                @if($posts->count())

                    <div class="mb-2 list-posts bg-white">
                        @foreach($posts as $post)

                        <x-post :post="$post" />

                        @endforeach
                    </div>

                @else

                <div> Sorry! No Post for the moment</div>

                @endif

                </div>

                {{$posts->links()}}

            </div>

        </div>

   </div>

@stop
