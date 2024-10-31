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
                    <div class="relative">
                        <select name="category" id="search-dropdown" 
                            class="block py-2.5 px-4 text-sm lg:text-lg text-gray-900 bg-gray-100 border border-gray-700 rounded-s-lg focus:ring-blueJR focus:border-blueJR"
                            onchange="location.href='{{ route('beranda', ['release_year' => request('release_year'), 'category' => '']) }}'.replace(/category=/, 'category=' + this.value + '&')">
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
                    <p>Tidak ada hasil untuk pencarian "<strong>{{ $query }}</strong>" dalam "<strong>{{ $category ? $category : 'Semua Kategori' }}</strong>" pada tahun "<strong>{{ $release_year ?? 'Semua Tahun' }}</strong>".</p>
                @else
                    <p>Menampilkan <strong>{{ $books->total() }}</strong> hasil untuk pencarian "<strong>{{ $query }}</strong>" dalam "<strong>{{ $category ? $category : 'Semua Kategori' }}</strong>" pada tahun "<strong>{{ $release_year ?? 'Seluruh Tahun' }}</strong>".</p>
                @endif
            </div>
            @endif

            {{-- Toast Filter --}}
            <div class="w-full flex justify-center">
                <div id="toast-success" class="hidden md:flex items-center w-fit px-4 py-3 mt-4 text-white bg-blueJR rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none;">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 mr-3 text-sm font-normal">
                        Filter {{ !empty($category) ? $category : 'Semua Kategori' }} pada tahun <strong>{{ $release_year ?? 'Semua Tahun' }}</strong> Berhasil.
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-500 hover:text-red-600 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close" onclick="hideToast()">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    if (localStorage.getItem('showToast') === 'true') {
                        showToast(); 
                        localStorage.removeItem('showToast'); 
                    }
            
                    const closeButton = document.querySelector("#toast-success button[aria-label='Close']");
                    if (closeButton) {
                        closeButton.addEventListener('click', function() {
                            hideToast(); 
                        });
                    }
                });
            
                function showToast() {
                    const toast = document.getElementById('toast-success');
                    toast.style.display = 'flex'; 
                }
            
                function hideToast() {
                    const toast = document.getElementById('toast-success');
                    toast.style.display = 'none'; 
                }
            </script>            
            
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

        <!-- Sidebar -->
        <div class="hidden lg:block w-1/4 pl-4 mb-8">
            <div class="bg-blueJR p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-white mb-4">
                    Filter {{ !empty($category) ? $category : 'Semua Kategori' }}
                </h2>
                        
                <div class="bg-white p-5 rounded-lg">
                    <div class="flex flex-col space-y-3">
                        @php
                            $currentYear = date('Y');
                            $lastFiveYears = range($currentYear, $currentYear - 4);
                        @endphp

                        <h2 class="text-lg font-semibold text-blueJR">Tahun Publikasi</h2>
                        <!-- Tahun -->
                        @foreach ($lastFiveYears as $year)
                        <div class="flex items-center gap-y-2">
                            <input 
                                id="radio-{{ $year }}" 
                                type="radio" 
                                value="{{ $year }}" 
                                name="year-filter" 
                                class="w-5 h-5 text-blueJR bg-gray-500 border-gray-500 focus:ring-blueJR focus:ring-2"
                                onclick="localStorage.setItem('showToast', 'true'); location.href='{{ route('beranda', ['release_year' => $year, 'category' => request('category'), 'query' => request('query')]) }}';"
                                {{ request('release_year') == $year ? 'checked' : '' }}
                            />
                            <label for="radio-{{ $year }}" class="ms-2 text-sm font-medium {{ request('release_year') == $year ? 'text-blueJR' : 'text-gray-500' }}">
                                {{ $year }}
                            </label>
                        </div>
                        @endforeach
                        
                        <!-- Kostum Input Tahun -->
                        <div class="flex items-center gap-y-2">
                            <input 
                                id="radio-custom" 
                                type="radio" 
                                name="year-filter" 
                                class="w-5 h-5 text-blueJR bg-gray-500 border-gray-500 focus:ring-blueJR focus:ring-2"
                                {{ in_array(request('release_year'), $lastFiveYears) ? '' : 'checked' }}
                                onclick="toggleInputState(this)"
                            />
                            <input 
                                type="text"  
                                id="yearInput" 
                                placeholder="Tahun Lainnya" 
                                inputmode="numeric" 
                                class="ml-2 border-gray-300 rounded w-32 p-2 text-sm text-gray-700 focus:ring-blueJR focus:border-blueJR"
                                oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length === 4) { location.href='{{ route('beranda', ['release_year' => '', 'category' => request('category'), 'query' => request('query')]) }}'.replace(/release_year=/, 'release_year=' + this.value); showToast(); }"
                                maxlength="4"  
                                style="outline: none;"  
                            />                                         
                        </div>

                        <script>
                            // Function to toggle the input state based on the radio button
                            function toggleInputState(radio) {
                                const yearInput = document.getElementById('yearInput');

                                // Check if the custom radio button is checked
                                if (radio.id === 'radio-custom' && radio.checked) {
                                    // If custom is checked, allow input and remove placeholder
                                    yearInput.placeholder = ''; // Remove placeholder
                                    yearInput.focus(); // Focus on the input
                                } else {
                                    // If any other radio button is checked, clear the input value and set placeholder
                                    yearInput.value = ''; // Clear input value
                                    yearInput.placeholder = 'Tahun Lainnya'; // Restore placeholder
                                }
                            }

                            // Handle the initial state based on the current selection
                            document.addEventListener('DOMContentLoaded', function () {
                                const yearInput = document.getElementById('yearInput');
                                const customRadio = document.getElementById('radio-custom');

                                // Keep the input value if the page is loaded with a year
                                const currentYear = '{{ request('release_year') }}';
                                if (currentYear) {
                                    yearInput.value = currentYear; // Set input value to current year
                                }

                                // Set the initial placeholder based on the current selection
                                if (customRadio.checked) {
                                    yearInput.placeholder = ''; // If custom is checked, remove placeholder
                                } else {
                                    yearInput.value = ''; // Clear input if custom is not checked
                                    yearInput.placeholder = 'Tahun Lainnya'; // Restore placeholder
                                }
                            });
                        </script>

                        <!-- All Years Option -->
                        <div class="flex items-center gap-y-2">
                            <input 
                                id="radio-all" 
                                type="radio" 
                                value="" 
                                name="year-filter" 
                                class="w-5 h-5 text-blueJR bg-gray-500 border-gray-500 focus:ring-blueJR focus:ring-2"
                                onclick="localStorage.setItem('showToast', 'true'); location.href='{{ route('beranda', ['release_year' => '', 'category' => request('category'), 'query' => request('query')]) }}';"
                                {{ request('release_year') == null ? 'checked' : '' }}
                            />
                            <label for="radio-all" class="ms-2 text-sm font-medium {{ request('release_year') == null ? 'text-blueJR' : 'text-gray-500' }}">
                                Seluruh Tahun
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



