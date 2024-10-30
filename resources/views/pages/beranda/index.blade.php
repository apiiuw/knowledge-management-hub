@extends('layouts.main')
@section('container')

<div class="bg-white w-full relative h-full pt-7 lg:pt-16 font-jakartaSans">
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
        <div class="w-full lg:w-3/4">
            <!-- Bagian Pencarian -->
            <form action="{{ route('beranda') }}" method="GET" class="w-full mx-auto">
                <div class="flex">
                    <!-- Dropdown Kategori -->
                    {{-- Auto Reload --}}
                    <div class="relative">
                        <select name="category" id="search-dropdown" class="block py-2.5 px-4 text-sm lg:text-lg text-gray-900 bg-gray-100 border border-gray-700 rounded-s-lg focus:ring-blueJR focus:border-blueJR">
                            <option value="" {{ $category == '' ? 'selected' : '' }}>Semua Kategori</option>
                            <option value="Artikel" {{ $category == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                            <option value="Buku Elektronik" {{ $category == 'Buku Elektronik' ? 'selected' : '' }}>Buku Elektronik</option>
                            <option value="Studi Kasus" {{ $category == 'Studi Kasus' ? 'selected' : '' }}>Studi Kasus</option>
                        </select>
                    </div>

                    <!-- Input Kata Kunci -->
                    <div class="relative w-full">
                        <input type="search" name="query" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm lg:text-lg text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-700 focus:ring-blueJR focus:border-blueJR" placeholder="Cari Kata Kunci..." value="{{ $query ?? '' }}" />
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blueJR rounded-e-lg border border-blueJR hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-700">
                            <svg class="w-3 h-3 lg:w-4 lg:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Pencarian</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Hasil Pencarian -->
            @if(isset($query))
                <div class="mt-4 text-gray-600 text-sm lg:text-base">
                    @if($books->isEmpty())
                        <p>Tidak ada hasil untuk pencarian "<strong>{{ $query }}</strong>" dalam "<strong>{{ $category ? $category : 'Semua Kategori' }}</strong>".</p>
                    @else
                        <p>Menampilkan <strong>{{ $books->total() }}</strong> hasil untuk pencarian "<strong>{{ $query }}</strong>" dalam "<strong>{{ $category ? $category : 'Semua Kategori' }}</strong>".</p>
                    @endif
                </div>
            @endif

            {{-- Toast Filter --}}

            
            <!-- Daftar Item -->
            @php
                $justifyClass = $books->count() === 1 ? 'justify-start' : 'justify-center';
            @endphp
            <div class="flex flex-wrap justify-center lg:{{ $justifyClass }} gap-3 my-8">
                @if(isset($query) && $books->isEmpty())
                    <div></div>
                @else
                    @foreach ($books as $book)
                        <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 flex flex-col">
                            <a href="/detail-buku/{{ $book->id }}">
                                <img id="pdf-cover-{{ $book->id }}" class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover" src="{{ asset('assets/images/pages/beranda/List-Buku/contoh1.jpg') }}" alt="Cover for {{ $book->title }}" />
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <a href="/detail-buku/{{ $book->id }}">
                                    <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900">{{ $book->title }}</h5>
                                </a>
                                <p class="text-sm font-semibold lg:text-base text-black">Tipe Dokumen: {{ $book->type }}</p>
                                <p class="mb-1 text-sm font-semibold lg:text-base text-black">Tahun Rilis: {{ $book->release_year }}</p>
                                <p class="mb-3 text-sm lg:text-base text-gray-700 line-clamp-3 flex-grow">{{ $book->description }}</p>
                                <a href="/detail-buku/{{ $book->id }}" class="inline-flex items-center justify-center text-base text-white bg-blueJR rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-700 mt-auto px-2 py-2">
                                    Baca selengkapnya
                                </a>                             
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Pagination -->
            @if ($books->isNotEmpty())
                <nav aria-label="Page navigation example" class="my-8 flex justify-center">
                    <ul class="inline-flex -space-x-px text-sm">
                        {{-- Tombol Sebelumnya --}}
                        <li>
                            @if ($books->onFirstPage())
                                <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-700 rounded-s-lg cursor-not-allowed opacity-50">
                                    Previous
                                </span>
                            @else
                                <a href="{{ $books->previousPageUrl() . '&query=' . urlencode($query) . '&category=' . urlencode($category) }}" 
                                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-700 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                                    Previous
                                </a>
                            @endif
                        </li>

                        {{-- Nomor Halaman --}}
                        @php
                            $currentPage = $books->currentPage();
                            $lastPage = $books->lastPage();

                            // Tentukan awal dan akhir berdasarkan posisi halaman saat ini
                            if ($lastPage <= 3) {
                                $start = 1;
                                $end = $lastPage;
                            } elseif ($currentPage == 1) {
                                $start = 1;
                                $end = 3;
                            } elseif ($currentPage == $lastPage) {
                                $start = $lastPage - 2;
                                $end = $lastPage;
                            } else {
                                $start = $currentPage - 1;
                                $end = $currentPage + 1;
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            <li>
                                <a href="{{ $books->url($i) . '&query=' . urlencode($query) . '&category=' . urlencode($category) }}" 
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-700 {{ $i === $currentPage ? 'text-blue-600 border-blue-700 bg-blue-50 hover:bg-blue-100' : 'hover:bg-gray-100 hover:text-gray-700' }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor

                        {{-- Tombol Berikutnya --}}
                        <li>
                            @if (!$books->hasMorePages())
                                <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-700 rounded-e-lg cursor-not-allowed opacity-50">
                                    Next
                                </span>
                            @else
                                <a href="{{ $books->nextPageUrl() . '&query=' . urlencode($query) . '&category=' . urlencode($category) }}" 
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-700 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                                    Next
                                </a>
                            @endif
                        </li>
                    </ul>
                </nav>
            @endif

            <!-- PDF.js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

            <script>
                @foreach ($books as $book) 
                    const url{{ $book->id }} = '{{ asset($book->pdf_file) }}'; // Use the PDF file path from the book data
                    let pdfDoc{{ $book->id }} = null;

                    // Load PDF and render cover image for the book
                    pdfjsLib.getDocument(url{{ $book->id }}).promise.then(doc => {
                        pdfDoc{{ $book->id }} = doc;
                        renderCover{{ $book->id }}();
                    });

                    // Function to render the cover image
                    function renderCover{{ $book->id }}() {
                        pdfDoc{{ $book->id }}.getPage(1).then(page => {
                            const viewport = page.getViewport({ scale: 0.5 });
                            const coverCanvas = document.createElement("canvas");
                            const coverCtx = coverCanvas.getContext("2d");

                            coverCanvas.height = viewport.height;
                            coverCanvas.width = viewport.width;

                            page.render({
                                canvasContext: coverCtx,
                                viewport: viewport
                            }).promise.then(() => {
                                const coverImage = coverCanvas.toDataURL("image/png");
                                document.getElementById("pdf-cover-{{ $book->id }}").src = coverImage; // Update the cover image for the book
                            });
                        });
                    }
                @endforeach
            </script>

            <style>
                #pdf-canvas {
                    transition: opacity 0.3s ease-in-out;
                }
            </style>

        </div>

        @php
            use Carbon\Carbon;
            $years = range(Carbon::now()->year, Carbon::now()->year - 4);
        @endphp

        <!-- Sidebar -->
        <div class="hidden lg:block w-1/4 pl-4 mb-8">
            <div class="bg-blueJR p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-white mb-4">Kategori</h2>
                {{-- Radio Button --}}
                <ul class="space-y-4">

                    <!-- Kategori Artikel -->
                    <li class="bg-white p-3 rounded-lg">
                        <h3 class="text-lg font-semibold text-blueJR">Artikel</h3>
                        <details class="ml-4 group">
                            {{-- Pilih tahun hapus --}}
                            <summary class="text-lg font-semibold text-blueJR cursor-pointer hover:underline">Pilih Tahun</summary>
                            <ul class="space-y-1 mt-2 ml-4 border-l-2 border-blueJR pl-2">
                                @foreach ($articleYears as $year)
                                    <li>
                                        <a href="{{ route('beranda', ['category' => 'Artikel', 'release_year' => $year, 'query' => request('query')]) }}" class="text-blueJR text-base flex items-center hover:underline">
                                            Artikel tahun {{ $year }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('beranda', ['category' => 'Artikel']) }}" class="text-blueJR text-base flex items-center underline">Seluruh Artikel</a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    <!-- Kategori Buku Elektronik -->
                    <li class="bg-white p-3 rounded-lg">
                        <h3 class="text-lg font-semibold text-blueJR">Buku Elektronik</h3>
                        <details class="ml-4 group">
                            <summary class="text-lg font-semibold text-blueJR cursor-pointer hover:underline">Pilih Tahun</summary>
                            <ul class="space-y-1 mt-2 ml-4 border-l-2 border-white pl-2">
                                @foreach ($bookYears as $year)
                                    <li>
                                        <a href="{{ route('beranda', ['category' => 'Buku Elektronik', 'release_year' => $year, 'query' => request('query')]) }}" class="text-blueJR text-base flex items-center hover:underline">
                                            Buku Elektronik tahun {{ $year }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('beranda', ['category' => 'Buku Elektronik']) }}" class="text-blueJR text-base flex items-center underline">Seluruh Buku Elektronik</a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    <!-- Kategori Studi Kasus -->
                    <li class="bg-white p-3 rounded-lg">
                        <h3 class="text-lg font-semibold text-blueJR">Studi Kasus</h3>
                        <ul class="ml-4 space-y-1 mt-2 border-l-2 border-blueJR pl-2">
                            <li>
                                <a href="{{ route('beranda', ['category' => 'Studi Kasus']) }}" class="text-blueJR text-base flex items-center underline">Seluruh Studi Kasus</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection



