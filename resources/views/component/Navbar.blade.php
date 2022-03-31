    {{-- nav --}}
    <nav class="bg-slate-800 fixed w-full z-50">
        <nav class="flex items-center justify-between container mx-auto font-pupylinux py-5 text-white xl:px-0 px-5">
            <p class="font-semibold text-2xl md:text-3xl">GoBlog</p>
            <ul class="hidden lg:flex items-center font-light">
                <li class="mr-7 {{ $active == 'home' ? 'font-medium' : '' }}"><a href="/">Home</a></li>
                <li class="mr-7 {{ $active == 'posts' ? 'font-medium' : '' }}"><a href="/posts">Blog</a></li>
                <li class="mr-7 {{ $active == 'about' ? 'font-medium' : '' }}"><a href="/about">About</a></li>
                <li class="{{ $active == 'contact' ? 'font-medium' : '' }}"><a href="/contact">Contact</a></li>
            </ul>
            <div class="lg:flex items-center hidden">
                @auth
                <p class="mr-6">Halo , {{ auth()->user()->username }}</p>
                <form action="/logout" method="post">
                    @csrf
                <button type="submit" class="py-2 px-7 text-white rounded-full bg-red-400 font-medium">Logout</button>
                </form>
                @else
                <a href="/login" class="py-2 px-7 text-white rounded-full bg-blue-400 font-medium">Login</a>
                @endauth
            </div>
            <div class="block lg:hidden">
                <img src="/img/menu-white.png" class="w-[40px] menu z-40 relative" alt="">
                <div class="absolute top-0 right-0 h-screen tembelan bg-[#00000086] transition-all"></div>
                <div class="absolute top-0 right-0 h-screen  bg-slate-700 munculmenu  transition-all flex flex-col justify-center overflow-hidden">
                    <ul class="text-center">
                        <li class="mb-4 {{ $active == 'home' ? 'font-semibold' : '' }}"><a href="/">Home</a></li>
                        <li class="mb-4 {{ $active == 'posts' ? 'font-semibold' : '' }}"><a href="/posts">Blog</a></li>
                        <li class="mb-4 {{ $active == 'about' ? 'font-semibold' : '' }}"><a href="/about">About</a></li>
                        <li class="{{ $active == 'contact' ? 'font-semibold' : '' }}"><a href="/contact">Contact</a></li>
                    </ul>
                    <div class="flex items-center justify-center mt-8 bottom-5 right-5 lg:hidden">
                        @auth
                        <p class="mr-3">Halo , {{ auth()->user()->username }}</p>
                        <form action="/logout" method="post">
                            @csrf
                        <button type="submit" class="py-2 px-7 text-white rounded-full bg-red-400 font-medium">Logout</button>
                        </form>
                        @else
                        <a href="/login" class="py-2 px-7 text-white rounded-full bg-blue-400 font-medium">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        </nav>

        </div>
        <script>
            const menu = document.querySelector('.menu')
            const munculmenu = document.querySelector('.munculmenu')
            const tembelan = document.querySelector('.tembelan')

            menu.addEventListener('click', () => {
                munculmenu.classList.toggle('aselimenu')
                tembelan.classList.toggle('aselitemeb')
            })
        </script>
        {{-- end nav --}}
