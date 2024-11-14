@extends('layouts.main')
@section('container')

<div class="bg-white w-full min-h-screen pt-16 md:pt-20">

    <section class="bg-white">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-xl font-bold text-gray-800 lg:text-3xl uppercase">Tentang Kami <br><span class=" font-semibold"><strong class="text-red-500">E</strong>dukasi <strong class="text-yellow-500">L</strong>alu <strong class="text-green-500">L</strong>intas</span></h1>
    
            <p class="mt-4 text-md lg:text-xl text-black xl:mt-6">
                Edukasi Lalu Lintas adalah platform edukasi digital yang didesain khusus untuk siswa sekolah dasar (SD) hingga sekolah menengah pertama (SMP) sebagai sarana pembelajaran tentang keselamatan dan aturan dalam berlalu lintas. Dibuat oleh Jasa Raharja Cabang DKI Jakarta, platform ini menyediakan beragam materi pembelajaran interaktif yang menarik dan mudah dipahami oleh anak-anak dan remaja. Kami percaya bahwa pendidikan tentang keselamatan berkendara dan kepatuhan berlalu lintas sejak dini dapat menumbuhkan generasi muda yang lebih peduli dan disiplin di jalan raya.
            </p>
            
            <p class="mt-4 text-md lg:text-xl text-black xl:mt-6">
                Melalui Edukasi Lalu Lintas, siswa dapat mempelajari hal-hal penting seperti:
                <ul class="mt-2 list-disc list-inside text-black">
                    <li>Aturan Dasar Lalu Lintas: Mengenal rambu-rambu lalu lintas, lampu lalu lintas, dan marka jalan.</li>
                    <li>Etika Berkendara yang Baik: Memahami pentingnya menghargai pengguna jalan lain, termasuk pejalan kaki dan pengendara sepeda.</li>
                    <li>Keselamatan di Jalan: Cara menyeberang yang benar, pentingnya mengenakan helm, dan tips menjaga keamanan diri saat berada di jalan raya.</li>
                </ul>
            </p>

            <p class="mt-4 text-md lg:text-xl text-black xl:mt-6">
                Dengan adanya Edukasi Lalu Lintas, Jasa Raharja berharap dapat membantu para siswa SD dan SMP untuk menjadi generasi yang lebih sadar akan pentingnya keselamatan di jalan dan mematuhi aturan lalu lintas sejak usia dini. Mari belajar bersama dan menjadi bagian dari masyarakat yang peduli keselamatan jalan raya!
            </p>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-3">
                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl transition duration-300 ease-in-out hover:scale-105">
                    <span class="inline-block text-blue-500">
                        <i class="fa-solid fa-s fa-2xl text-black"></i>
                    </span>
    
                    <h1 class="text-xl font-semibold text-gray-700 capitalize">Spesifik</h1>
    
                    <p class="text-gray-500">
                        Meningkatkan kesadaran siswa SD dan SMP di Dusun Karangrejek akan pentingnya keselamatan lalu lintas serta mengurangi angka kecelakaan di wilayah tersebut.
                    </p>
                    <a href="#" class="inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100 hover:underline hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
    
                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl transition duration-300 ease-in-out hover:scale-105">
                    <span class="inline-block text-blue-500">
                        <i class="fa-solid fa-m fa-2xl text-black"></i>
                    </span>
    
                    <h1 class="text-xl font-semibold text-gray-700 capitalize">Meassurable</h1>
    
                    <p class="text-gray-500">
                        Program ini diharapkan mampu mengurangi pelanggaran lalu lintas yang melibatkan anak usia sekolah serta menurunkan angka kecelakaan hingga 50%.
                    </p>
    
                    <a href="#" class="inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100 hover:underline hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
    
                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl transition duration-300 ease-in-out hover:scale-105">
                    <span class="inline-block text-blue-500">
                        <i class="fa-solid fa-a fa-2xl text-black"></i>
                    </span>
    
                    <h1 class="text-xl font-semibold text-gray-700 capitalize">Achiveable</h1>
    
                    <p class="text-gray-500">
                        Program ini didukung dengan materi ajar tentang keselamatan lalu lintas untuk SD, SMP, dan SMA yang telah terdaftar di Dikbud dan dapat diakses secara daring.
                    </p>
    
                    <a href="#" class="inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100 hover:underline hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl transition duration-300 ease-in-out hover:scale-105">
                    <span class="inline-block text-blue-500">
                        <i class="fa-solid fa-r fa-2xl text-black"></i>
                    </span>
    
                    <h1 class="text-xl font-semibold text-gray-700 capitalize">Relevan</h1>
    
                    <p class="text-gray-500">
                        Peningkatan pengetahuan dan keterlibatan dalam keselamatan lalu lintas dapat mengurangi angka kecelakaan, yang merupakan salah satu target utama perusahaan.
                    </p>
    
                    <a href="#" class="inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100 hover:underline hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl transition duration-300 ease-in-out hover:scale-105">
                    <span class="inline-block text-blue-500">
                        <i class="fa-solid fa-t fa-2xl text-black"></i>
                    </span>
    
                    <h1 class="text-xl font-semibold text-gray-700 capitalize">Time</h1>
    
                    <p class="text-gray-500">
                        Dalam waktu tiga tahun, program ini diharapkan dapat mencapai tujuan “zero accident”.
                    </p>
    
                    <a href="#" class="inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100 hover:underline hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection