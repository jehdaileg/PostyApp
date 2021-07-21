@extends('layouts.app')

@section('content')

<div class="dashboard">

    <div class="flex justify-center">



        <div class="w-8/12 rounded-lg bg-white p-6">

            @if(session('success'))

            <div class="border bg-green-300 text-center mb-3 text-white p-2 w-full rounded-lg">
                {{session('success')}}
            </div>

        @endif
            Dashboard

        </div>

    </div>

</div>


@endsection
