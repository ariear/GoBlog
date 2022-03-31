@extends('dashboard.maindashboard')
@section('container')
<div class="pb-16">
    <p class="font-normal text-2xl mt-5 ml-10">Category</p>

    <p class="py-3 px-6 bg-[#f38f70] w-max text-white rounded-xl ml-3 md:ml-10 mt-10 cursor-pointer"><a href="/dashboard/category/create">Create New Category</a></p>
<div class="mx-3 md:mx-0 md:ml-10 mt-10">
    <table class="border border-[#f38f70]">
        <thead class="bg-[#f38f70]">
            <tr>
                <th class="px-2 md:px-5 py-3 text-white font-medium border-r">No</th>
                <th class="px-5 py-3 text-white font-medium border-r">Name</th>
                <th class="px-5 py-3 text-white font-medium ">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="border-b border-[#f38f70]">
                <td class="py-4 text-center border-r">{{ $loop->iteration }}</td>
                <td class="px-3 border-r">{{ $category->name }}</td>
                <td class="px-3 py-3 text-center flex items-center">
                    <a href="/dashboard/category/{{ $category->id }}/edit"><p class="py-2 px-3 md:px-7 text-xs md:text-base font-medium rounded-full bg-blue-400 text-white md:inline md:mr-3">Edit</p></a>
                    <form action="/dashboard/category/{{ $category->id }}" method="post">
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
