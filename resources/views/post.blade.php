@extends('app')
@section('container')
    <div class="py-28 md:py-36 font-pupylinux w-[90vw] md:w-[80vw] xl:container mx-auto relative">
        <p class="font-medium text-2xl">{{ $post->title }}</p>
        <img src="/storage/{{ $post->image }}" class="w-full h-[300px] object-cover object-center rounded-lg mt-9" alt="">
        <p class="mt-4">Category : <span class="text-blue-500 mr-4"><a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></span><span class="text-slate-400">{{ $post->created_at->diffForHumans() }}</span></p>
        <article class="mt-6 overflow-hidden">
            {!! $post->content !!}
        </article>
    </div>
@endsection
