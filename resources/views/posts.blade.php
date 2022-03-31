@extends('app')
@section('container')
    <div class="py-20">

        <p class="text-center pt-20 font-pupylinux font-medium text-3xl md:text-4xl">{{ $title }}</p>
        <div class="mx-auto w-max mt-10">
            <form action="/posts" method="get">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" id="" class="py-2 px-3 rounded-lg border border-slate-800 mr-3 w-[50vw] md:w-[300px]">
                <button class="py-2 px-4 rounded-lg text-white bg-slate-700 font-pupylinux">Search</button>
            </form>
        </div>

        <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 mt-16 pb-16 justify-items-center">

            @forelse ($posts as $post)
            <div class="w-[300px] relative pb-14">
                @if ($post->image)
                    <img src="/storage/{{ $post->image }}" class="w-[300px] h-[200px] rounded-xl object-cover object-center" alt="">
                @else
                <img src="https://source.unsplash.com/500x400/{{ $post->category->name }}" class="w-[300px] rounded-xl" alt="">
                @endif
                <p class="font-pupylinux font-medium text-lg my-2">{{ $post->title }}</p>
                <p>{!! $post->excerpt !!}</p>
                <p class="absolute right-0 bottom-0 py-2 px-4 bg-slate-600 rounded-lg text-white"><a href="/posts/{{ $post->slug }}">Read More</a></p>
            </div>
            @empty
            <p class="text-center font-pupylinux text-lg absolute ">Post Not Found</p>
            @endforelse
        </div>
        @if (!request('search') || !request('category'))
        <div class="w-[90vw] xl:container mx-auto">
            {{ $posts->links('pagination::tailwind') }}
        </div>
        @endif


    </div>
@endsection
