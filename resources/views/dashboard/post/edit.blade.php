@extends('dashboard.maindashboard')
@section('container')
    <p class="font-pupylinux font-medium text-2xl ml-10 mt-5">Update Post</p>
    <form action="/dashboard/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="font-pupylinux ml-10 mt-5 w-[90%]">
        <div>
            <label for="image">Thumbnail</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            <input type="file" name="image" id="image" class="mt-2">
        </div>
        <div class="flex flex-col mt-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="py-2 px-3 rounded-lg border mt-2">
        </div>
        <div class="flex flex-col mt-4">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="mt-2 border p-2 rounded-lg">
                @foreach ($categories as $category)
                @if ($post->category->id == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="border rounded-lg mt-2">{{ $post->content }}</textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="py-2 px-5 rounded-lg bg-orange-400 text-white">Add Post</button>
        </div>
    </div>
    </form>
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
  </script>
<script>
    CKEDITOR.replace('content', options);
    </script>
@endpush

