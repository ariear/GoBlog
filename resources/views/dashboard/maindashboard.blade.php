<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="font-pupylinux flex">
@include('dashboard.component.sidebar')
<div class="grow">
<div class="flex justify-between lg:justify-end pt-7 px-5 md:px-10">
    <img src="/asset/hamburger.png" class="block lg:hidden" alt="" >
    <div class="flex items-center">
        <img src="/asset/pp.png" alt="">
        <div class="ml-5 md:block hidden">
            <p class="font-light">{{ auth()->user()->username }}</p>
            <p class="font-light text-sm text-slate-400">{{ auth()->user()->isAdmin ? 'Admin' : 'Bukan Admin' }}</p>
        </div>
    </div>
</div>
@yield('container')
</div>
</div>
@stack('scripts')
</body>
</html>
