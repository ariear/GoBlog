@extends('app')
@section('container')
    <div class="h-screen overflow-y-auto font-pupylinux flex justify-center flex-col items-center">
        @if (session()->has('success'))
        <div class="fixed z-50 right-10 bg-blue-400 text-white rounded-lg p-5 font-pupylinux alertafakah top-24">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="fixed z-50 right-10 bg-red-400 text-white rounded-lg p-5 font-pupylinux alertafakah top-24">
            <p>{{ session('error') }}</p>
        </div>
        @endif
        <div class="w-[300px] shadow border rounded-xl py-4 px-4">
            <p class="font-medium text-xl text-center">Login</p>
            <form action="/login" method="post">
                @csrf
            <div class="flex flex-col">
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
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="py-2 px-14 text-white bg-blue-400 rounded-full">Login</button>
            </div>
            </form>
            <p class="text-sm text-blue-400 text-center mt-7"><a href="/register">Belum punya akun ?</a></p>
        </div>
    </div>
    <script>
        const berhasil = document.querySelector('.berhasil')
        berhasil.addEventListener('click', () => {
            berhasil.classList.add('hidden')
        })
    </script>
    <script>
                const alertafakah = document.querySelector('.alertafakah')
            alertafakah.addEventListener('click', () => {
              alertafakah.classList.add('hidden')
            })
            setTimeout(() => {
              alertafakah.classList.add('hidden')
            }, 3000);
    </script>
@endsection
