@extends('layouts.app')

@section('content')

<div class="dashboard">


    <div class="flex justify-center">

        <div class="w-8/12 ">

            <div class="p-6">

                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>

                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received

                {{ $user->receivedLike->count() }} {{ Str::plural('like', $user->receivedLike->count()) }}</p>

            </div>

                <div class="rounded-lg bg-white p-6">

                    @if($posts->count())

                    <div class="mb-2 list-posts bg-white">
                        @foreach($posts as $post)

                        <x-post :post="$post" />

                        @endforeach
                        {{ $posts->links() }}
                    </div>

                @else

                <div> {{$user->username}} does not have post for the moment</div>

                @endif


                </div>

        </div>

    </div>

</div>


@endsection
