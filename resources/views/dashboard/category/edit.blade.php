@extends('dashboard.maindashboard')
@section('container')
    <p class="font-pupylinux font-medium text-2xl ml-10 mt-5">Update Category</p>
    <form action="/dashboard/category/{{ $category->id }}" method="post">
    @method('put')
    @csrf
    <div class="font-pupylinux ml-10 mt-5 w-[300px]">
        <div class="flex flex-col mt-4">
            <label for="name">Category</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="py-2 px-3 rounded-lg border mt-2">
        </div>
        <div class="mt-4">
            <button type="submit" class="py-2 px-5 rounded-lg bg-orange-400 text-white">Update Category</button>
        </div>
    </div>
    </form>
@endsection
