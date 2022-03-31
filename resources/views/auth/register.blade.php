@extends('app')
@section('container')
<div class="h-screen overflow-y-auto font-pupylinux flex justify-center items-center">
    <div class="w-[300px] shadow border rounded-xl py-4 px-4">
        <p class="font-medium text-xl text-center">Register</p>
        <form action="/register" method="post">
            @csrf
        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" name="name" class="py-2 px-3 border rounded-lg" id="name">
            @error('name')
                <p class="font-light text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mt-4">
            <label for="username">Username</label>
            <input type="text" name="username" class="py-2 px-3 border rounded-lg" id="username">
            @error('username')
            <p class="font-light text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mt-4">
            <label for="email">Email</label>
            <input type="email" name="email" class="py-2 px-3 border rounded-lg" id="email">
            @error('email')
            <p class="font-light text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col my-4">
            <label for="password">Password</label>
            <input type="password" name="password" class="py-2 px-3 border rounded-lg" id="password">
            @error('password')
            <p class="font-light text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-center">
            <button type="submit" class="py-2 px-14 text-white bg-blue-400 rounded-full">Register</button>
        </div>
        </form>
        <p class="text-sm text-blue-400 text-center mt-7"><a href="/login">Udah punya akun?</a></p>
    </div>
</div>
@endsection
