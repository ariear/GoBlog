@extends('app')
@section('container')
    {{-- alert --}}
    @if (session()->has('success'))
    <div class="fixed z-50 right-10 bg-blue-400 text-white rounded-lg p-5 font-pupylinux alertafakah top-24">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    {{-- end alert --}}
    <div class="font-pupylinux pt-48 pb-36 bg-slate-500 text-white text-center bg-[url('/img/logobg.png')] bg-cover bg-center">
        <p class="font-medium text-5xl mb-3 md:px-0 px-4">Welcome To My Blog</p>
        <p class="md:w-[400px] mx-auto mb-5 font-light md:px-0 px-4">Disini kami membagikan artikel tentang seputar teknologi , programming , dan game</p>
        <div class="flex justify-center mb-16">
            <p class="mr-2 text-blue-300">Im a </p>
            <div id="typed-strings">
                <p>Webdev <span class="text-blue-300">enthusiast</span></p>
                <p>Student</p>
                <p>Weebs</p>
            </div>
            <span id="typed"></span>
        </div>

        <p class="text-white py-3 px-10 rounded-full bg-slate-400 w-max mx-auto"><a href="/posts">Lets Read</a></p>
    </div>

    <div class="font-pupylinux">
        <p class="text-center font-medium text-3xl py-16">Latest Post</p>

        <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 pb-16 justify-items-center">

            @forelse ($posts as $post)
            <div class="w-[300px] relative pb-14">
                @if ($post->image)
                <img src="/storage/{{ $post->image }}" class="w-[300px] h-[200px] rounded-xl object-cover object-center" alt="">
                @else
                <img src="https://source.unsplash.com/500x400/{{ $post->category->name }}" class="w-[300px] rounded-xl" alt="">
                @endif
                <p class="font-pupylinux font-medium my-2 text-lg">{{ $post->title }}</p>
                <p>{!! $post->excerpt !!}</p>
                <p class="absolute right-0 bottom-0 py-2 px-4 bg-slate-600 rounded-lg text-white"><a href="/posts/{{ $post->slug }}">Read More</a></p>
            </div>
            @empty
            <p class="text-center font-pupylinux text-lg absolute ">Post Not Found</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed('#typed', {
          stringsElement: '#typed-strings',
          strings: ['First ^1000 sentence.', 'Second sentence.'],
          backDelay: 1000,
          typeSpeed: 50,
          backSpeed: 40,
          loop: true
        });
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
