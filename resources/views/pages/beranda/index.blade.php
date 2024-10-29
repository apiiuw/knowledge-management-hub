@extends('layouts.main')
@section('container')

<div class="bg-white w-full relative h-full pt-7 lg:pt-16">
    <!-- Carousel dan Logo Knowledge Management Hub (tetap) -->
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('assets/images/pages/beranda/BerandaPresent1.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('assets/images/pages/beranda/BerandaPresent2.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('assets/images/pages/beranda/BerandaPresent3.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                <svg class="w-3 h-3 lg:w-6 lg:h-6 text-blue-500 hover:text-blue-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                <svg class="w-3 h-3 lg:w-6 lg:h-6 text-blue-500 hover:text-blue-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="bg-white absolute z-30 left-1/2 -translate-x-1/2 -mt-16 lg:-mt-12 flex flex-col justify-center items-center shadow-lg shadow-black/20 rounded-lg p-4 pt-3 pb-6 w-4/5">
        <img class=" w-28 lg:w-56" src="{{ asset('assets/images/logo/Jasa Raharja Logo Member of IFG.png') }}" alt="">
        <p class="text-md lg:text-3xl font-jakartaSans font-bold text-black text-center mt-3">
            KNOWLEDGE MANAGEMENT HUB<br><span class="text-sm lg:text-2xl text-white bg-blueJR px-3 py-1">Jasa Raharja Cabang DKI Jakarta</span>
        </p>
    </div>

    <!-- Bagian Search dan Sidebar Kategori -->
    <div class="flex flex-col lg:flex-row justify-center mt-36 lg:mt-72 text-md lg:text-xl mx-[5%]">
        <!-- Bagian Pencarian -->
        <div class="w-full lg:w-3/4">
            <form class="w-full mx-auto">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm lg:text-lg font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
                        Semua Kategori
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm lg:text-lg text-gray-700" aria-labelledby="dropdown-button">
                            <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Artikel</button></li>
                            <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Buku Elektronik</button></li>
                            <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Studi Kasus</button></li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm lg:text-lg text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blueJR focus:border-blueJR" placeholder="Cari Kata Kunci..." required />
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blueJR rounded-e-lg border border-blueJR hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-3 h-3 lg:w-4 lg:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Pencarian</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Daftar Item -->
            <div class="flex flex-wrap justify-center lg:justify-start gap-3 my-8">
                {{-- List 1 --}}
                <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="" />
                    </a>                
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">PENGANTAR BISNIS</h5>
                        </a>
                        <p class="mb-3 text-sm lg:text-base text-gray-700 dark:text-gray-400">Buku ini memaparkan berbagai aspek esensial, mulai dari pengertian dan sejarah perkembangan bisnis hingga peluang dan tantangan yang dihadapi.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- List 2 --}}
                <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="" />
                    </a>                
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">PENGANTAR BISNIS</h5>
                        </a>
                        <p class="mb-3 text-sm lg:text-base text-gray-700 dark:text-gray-400">Buku ini memaparkan berbagai aspek esensial, mulai dari pengertian dan sejarah perkembangan bisnis hingga peluang dan tantangan yang dihadapi.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- List 3 --}}
                <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="" />
                    </a>                
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">PENGANTAR BISNIS</h5>
                        </a>
                        <p class="mb-3 text-sm lg:text-base text-gray-700 dark:text-gray-400">Buku ini memaparkan berbagai aspek esensial, mulai dari pengertian dan sejarah perkembangan bisnis hingga peluang dan tantangan yang dihadapi.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- List 4 --}}
                <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="" />
                    </a>                
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">PENGANTAR BISNIS</h5>
                        </a>
                        <p class="mb-3 text-sm lg:text-base text-gray-700 dark:text-gray-400">Buku ini memaparkan berbagai aspek esensial, mulai dari pengertian dan sejarah perkembangan bisnis hingga peluang dan tantangan yang dihadapi.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- List 5 --}}
                <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="" />
                    </a>                
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">PENGANTAR BISNIS</h5>
                        </a>
                        <p class="mb-3 text-sm lg:text-base text-gray-700 dark:text-gray-400">Buku ini memaparkan berbagai aspek esensial, mulai dari pengertian dan sejarah perkembangan bisnis hingga peluang dan tantangan yang dihadapi.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- List 6 --}}
                <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="" />
                    </a>                
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white">PENGANTAR BISNIS</h5>
                        </a>
                        <p class="mb-3 text-sm lg:text-base text-gray-700 dark:text-gray-400">Buku ini memaparkan berbagai aspek esensial, mulai dari pengertian dan sejarah perkembangan bisnis hingga peluang dan tantangan yang dihadapi.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

<!-- Sidebar -->
<div class="hidden lg:block w-1/4 pl-4">
    <div class="bg-blueJR p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-white mb-4">Kategori</h2>
        <ul class="space-y-4">

            <!-- Kategori Artikel dengan background putih -->
            <li class="bg-white p-3 rounded-lg">
                <h3 class="text-lg font-semibold text-blueJR">Artikel</h3>
                <details class="ml-4 group">
                    <summary class="text-lg font-semibold text-blueJR cursor-pointer hover:underline">Pilih Tahun</summary>
                    <ul class="space-y-1 mt-2 ml-4 border-l-2 border-blueJR pl-2">
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Artikel</span>tahun 2024</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Artikel</span>tahun 2023</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Artikel</span>tahun 2022</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Artikel</span>tahun 2021</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Artikel</span>tahun 2020</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center underline"><span class="material-icons mr-2">Seluruh Artikel</span></a></li>
                    </ul>
                </details>
            </li>

            <!-- Kategori Buku Elektronik (tetap dengan warna asli) -->
            <li class="bg-white p-3 rounded-lg">
                <h3 class="text-lg font-semibold text-blueJR">Buku Elektronik</h3>
                <details class="ml-4 group">
                    <summary class="text-lg font-semibold text-blueJR cursor-pointer hover:underline">Pilih Tahun</summary>
                    <ul class="space-y-1 mt-2 ml-4 border-l-2 border-white pl-2">
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Buku Elektronik</span>tahun 2024</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Buku Elektronik</span>tahun 2023</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Buku Elektronik</span>tahun 2022</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Buku Elektronik</span>tahun 2021</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center hover:underline"><span class="material-icons mr-2">Buku Elektronik</span>tahun 2020</a></li>
                        <li><a href="#" class="text-blueJR text-base flex items-center underline"><span class="material-icons mr-2">Seluruh Buku Elektronik</span></a></li>
                    </ul>
                </details>
            </li>

            <!-- Kategori Studi Kasus dengan background putih -->
            <li class="bg-white p-3 rounded-lg">
                <h3 class="text-lg font-semibold text-blueJR">Studi Kasus</h3>
                <ul class="ml-4 space-y-1 mt-2 border-l-2 border-blueJR pl-2">
                    <li><a href="#" class="text-blueJR text-base flex items-center underline"><span class="material-icons mr-2">Seluruh Studi Kasus</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>



    </div>
</div>

@endsection



