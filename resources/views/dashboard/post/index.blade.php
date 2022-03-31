@extends('dashboard.maindashboard')
@section('container')
<div class="pb-16">
    <p class="font-normal text-2xl mt-5 ml-10">Posts</p>

    <p class="py-3 px-6 bg-[#f38f70] w-max text-white rounded-xl ml-3 md:ml-10 mt-10 cursor-pointer"><a href="/dashboard/posts/create">Create New Post</a></p>
<div class="mx-3 md:mx-0 md:ml-10 mt-10">
    <table class="border border-[#f38f70]">
        <thead class="bg-[#f38f70]">
            <tr>
                <th class="px-2 md:px-5 py-3 text-white font-medium border-r">No</th>
                <th class="px-5 py-3 text-white font-medium md:w-[180px] lg:w-[200px] xl:w-[300px] border-r">Title</th>
                <th class="px-5 py-3 text-white font-medium border-r ">Category</th>
                <th class="px-5 py-3 text-white font-medium ">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr class="border-b border-[#f38f70]">
                <td class="py-4 text-center border-r">{{ $loop->iteration }}</td>
                <td class="pl-3 border-r">{{ $post->title }}</td>
                <td class="pl-3 pb-2 border-r ">
                    <p class="py-2 px-4 bg-[#f38f70] rounded-full text-white w-max mt-2 mr-2 text-xs">{{ $post->category->name }}</p>
                </td>
                <td class="px-3 py-3 text-center flex items-center">
                    <a href="/dashboard/posts/{{ $post->id }}/edit"><p class="py-2 px-3 md:px-7 text-xs md:text-base font-medium rounded-full bg-blue-400 text-white md:inline md:mr-3">Edit</p></a>
                    <form action="/dashboard/posts/{{ $post->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="py-2 px-3 md:px-7 text-xs md:text-base font-medium rounded-full bg-red-400 md:inline text-white md:mt-0 mt-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- end table posts -->

</div>
@endsection
