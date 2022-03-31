
    <!-- sidebar -->
  <div class="w-[270px] xl:w-[330px] h-screen sticky top-0 bg-[#f38f70] hidden lg:flex flex-col items-center justify-between pt-24 text-white overflow-y-auto">
    <div>
    <p class="font-semibold text-3xl">GoBlog.</p>
    <div class="font-normal mt-24">
        <p><a href="/dashboard">Dashboard</a></p>
        <p class="mt-6"><a href="/dashboard/posts">Post</a></p>
        <p class="mt-6"><a href="/dashboard/category">Category</a></p>
        <p class="mt-6"><a href="/dashboard/users">User</a></p>
    </div>
    </div>

    <div class="flex items-center px-6 py-4 mb-4 bg-[#ffffff2a] rounded-2xl w-max mx-auto">
        <img src="/asset/book.png" alt="">
        <div class="ml-3">
            <p class="font-normal">User Guide</p>
            <p class="font-light text-sm">Documentation</p>
        </div>
    </div>

  </div>
  <!-- end sidebar -->
  <!-- sidebar mobile & tablet -->
  <div class="fixed top-0 left-0 w-screen h-screen bg-[#00000041] lg:hidden" :class="sidebarmobile ? 'block' : 'hidden' " ></div>
  <div class="h-screen fixed top-0 bg-[#f38f70] flex lg:hidden flex-col items-center justify-between pt-24 text-white overflow-y-auto transition-all" :class="sidebarmobile ? 'w-[70vw] md:w-[60vw]' : 'w-0' ">
    <div>
    <p class="font-semibold text-3xl">GoBlog.</p>
    <div class="font-normal mt-24">
        <p><a href="/dashboard">Dashboard</a></p>
        <p class="mt-6"><a href="/dashboard/posts">Post</a></p>
        <p class="mt-6"><a href="/">Categories</a></p>
        <p class="mt-6"><a href="/">Media</a></p>
        <p class="mt-6"><a href="/">Users</a></p>
        <p class="mt-6"><a href="/">Settings</a></p>
    </div>
    </div>

    <div class="flex items-center px-6 py-4 mb-4 bg-[#ffffff2a] rounded-2xl w-max mx-auto">
        <img src="/asset/book.png" alt="">
        <div class="ml-3">
            <p class="font-normal">User Guide</p>
            <p class="font-light text-sm">Documentation</p>
        </div>
    </div>

  </div>
  <!-- end sidebar mobile & tablet -->
