@extends('dashboard.maindashboard')
@section('container')
<p class="font-normal text-2xl mt-5 ml-10">Dashboard</p>

<div class="flex flex-col md:flex-row ml-3 lg:ml-10 mt-8">
    <div class="flex justify-between items-center bg-[#ff696428] w-[94vw] md:w-[220px] lg:w-[200px] xl:w-[250px] px-6 py-8 rounded-2xl">
        <div>
            <p class="font-normal text-xl">Posts</p>
            <p class="font-light text-3xl text-[#FF6A64] mt-2">{{ $post->count() }}</p>
        </div>
        <img src="/asset/icon-write.png" alt="">
    </div>
    <div class="flex justify-between items-center bg-[#ff696428] w-[94vw] md:w-[220px] lg:w-[230px] xl:w-[250px] px-6 py-8 rounded-2xl md:ml-7 md:mt-0 mt-4">
        <div>
            <p class="font-normal text-xl">Categories</p>
            <p class="font-light text-3xl text-[#FF6A64] mt-2">{{ $category->count() }}</p>
        </div>
        <img src="/asset/icon-square.png" alt="">
    </div>
    <div class="flex justify-between items-center bg-[#ff696428] w-[94vw] md:w-[220px] lg:w-[200px] xl:w-[250px] px-6 py-8 rounded-2xl md:ml-7 md:mt-0 mt-4">
        <div>
            <p class="font-normal text-xl">Users</p>
            <p class="font-light text-3xl text-[#FF6A64] mt-2">{{ $user->count() }}</p>
        </div>
        <img src="/asset/icon-pp.png" alt="">
    </div>
</div>

<!-- table start -->
<div class="ml-2 md:ml-10 mt-10 pb-14">
<p class="font-normal text-xl">Latest Posts</p>

<div>
@foreach ($posts as $post)
<div class="flex w-[94vw] md:w-[500px] mt-4">
    @if ($post->image)
    <img src="/storage/{{ $post->image }}" class="w-[200px] h-[150px] object-cover object-center" alt="">
    @else
    <img src="https://source.unsplash.com/500x300/?{{ $post->category->name }}" class="w-[200px]  rounded-xl object-cover object-center" alt="">
    @endif
    <div class="ml-4 mt-1 flex flex-col justify-between">
        <p class="text-lg font-medium">{{ $post->title }}</p>
        <div class="flex items-center mb-3">
            <p class="font-normal text-sm text-[#FF6A64] mr-3">Read More</p>
            <img src="/asset/arrow-orange-right.png" class="w-[30px]" alt="">
        </div>
    </div>
</div>
@endforeach
</div>
</div>
@endsection
