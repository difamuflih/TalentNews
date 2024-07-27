<x-guest-layout>

    <x-header></x-header>

    {{-- awal news --}}
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">

        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Baca barita terbaru</h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">Jelajahi 3 berita terkini yang wajib Anda ketahui hari ini!</p>
        </div>

        <div class="grid grid-rows gap-6">
            @foreach ($latestNews as $news)
            
                <div class="bg-white rounded-3xl items-center  p-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2  lg:p-6">
                    <img class="w-full rounded-l-2xl" src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg" alt="Random Image">
                    <div class="mt-4 md:mt-0">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $news->title }}</h2>
                        <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">{{ Str::limit($news->news, 100) }}</p>
                        <a href="/news/{{ $news->slug }} " class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-900">
                            Read More
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
        </div>
    </section>
    {{-- akhir news --}}
    
    
    {{-- awal category --}}
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
    <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Category</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Dapatkan informasi yang paling menarik bagi Anda dengan memilih kategori berita yang sesuai dengan hobi dan minat Anda!</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                
                @foreach ($categories as $category)
                    
                <a href="/categories/{{ $category->slug }}">
                    <div class="bg-white dark:bg-gray-900 rounded-lg p-3 items-center flex flex-col justify-center">
                        <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                            <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">{{ $category->category }}</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-center">{{ $category->about }}</p>
                    </div>
                </a>

                @endforeach

            </div>
        </div>
      </section>
    {{-- akhir category --}}
    
    <x-footer></x-footer>

</x-guest-layout>