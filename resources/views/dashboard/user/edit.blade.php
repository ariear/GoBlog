@extends('dashboard.maindashboard')
@section('container')
    <p class="font-pupylinux font-medium text-2xl ml-10 mt-5">Update Users</p>
    <form action="/dashboard/users/{{ $user->id }}" method="post">
        @method('put')
    @csrf
    <div class="font-pupylinux ml-10 mt-5 w-[300px]">
        <div class="flex flex-col mt-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="py-2 px-3 rounded-lg border mt-2" value="{{ old('name', $user->name) }}">
        </div>
        <div class="flex flex-col mt-4">
            <label for="name">Username</label>
            <input type="text" name="username" id="username" class="py-2 px-3 rounded-lg border mt-2" value="{{ old('username', $user->username) }}">
        </div>
        <div class="flex flex-col mt-4">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="py-2 px-3 rounded-lg border mt-2" value="{{ old('email', $user->email) }}">
        </div>
        <div class="flex mt-4 items-center">
            <input type="checkbox" name="isAdmin" id="isAdmin" class="py-2 px-3 rounded-lg border mr-2" value="{{ true }}">
            <label for="password">Jadikan Admin ?</label>
        </div>
        <div class="mt-4">
            <button type="submit" class="py-2 px-5 rounded-lg bg-orange-400 text-white">Update Users</button>
        </div>
    </div>
    </form>
@endsection
