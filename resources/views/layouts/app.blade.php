<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/fonts/css/font-awesome.css">
    <link rel="stylesheet" href="/fonts/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">

    <title>Posty App</title>
</head>

<body class="bg-blue-100">

    <div class="section-nav">

       <nav class="p-5 bg-white mb-6 flex justify-between">

        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{  route('posts') }}" class="p-3">Posts</a>
            </li>

        </ul>
        <ul class="flex items-center">

            @auth

               <li>
                <a href="" class="p-3">{{ Auth::user()->name }} <span class="text-green-500"></span></a>
               </li>

               <div class="relative inline-block">
                <img class="inline-block object-cover w-12 h-12 rounded-full" src="{{ asset('storage/' .Auth::user()->profil) }}" alt="Profile image"/>
                <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white rounded-full"></span>
              </div>

               <li>
                 <form action="{{ route('logout')}}" class="p-3 inline" method="post">
                    @csrf
                    <button type="submit">Logout</button>

                 </form>
               </li>


            @endauth


            @guest

            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}"class="p-3">Register</a>
            </li>

            @endguest


        </ul>

       </nav>

    </div>

<div class="main">
    @yield('content')
</div>

</body>
</html>
