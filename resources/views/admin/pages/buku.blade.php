@extends('admin.layout.layout-admin')
@section('container')

<div class="p-4 sm:ml-64 bg-white">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20">

        <!-- Floating Button -->
        <div class="group fixed bottom-0 right-0 p-2 flex items-end justify-end w-fit h-fit">
            <!-- Main Button -->
            <a href="{{ route('admin.buku.create') }}" class="text-white shadow-xl flex items-center justify-center p-3 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 z-50 absolute">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-10 h-10 fill-white group-hover:rotate-90 transition-all duration-[0.6s]">
                    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                </svg>
            </a>
        </div>

        {{-- Pencarian --}}
        <form action="{{ route('admin.pages.buku') }}" method="GET" class="w-full mx-auto">
            <div class="flex">
                <!-- Dropdown Kategori -->
                <div class="relative">
                    <select name="category" id="search-dropdown" 
                        class="block py-2.5 px-4 text-sm lg:text-lg text-gray-900 bg-gray-100 border border-gray-700 rounded-s-lg focus:ring-blueJR focus:border-blueJR"
                        onchange="this.form.submit()">
                        <option value="" {{ request('category') == '' ? 'selected' : '' }}>Semua Kategori</option>
                        <option value="Artikel" {{ request('category') == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                        <option value="Buku Elektronik" {{ request('category') == 'Buku Elektronik' ? 'selected' : '' }}>Buku Elektronik</option>
                        <option value="Studi Kasus" {{ request('category') == 'Studi Kasus' ? 'selected' : '' }}>Studi Kasus</option>
                    </select>
                </div>

                <!-- Input Kata Kunci -->
                <div class="relative w-full">
                    <input type="search" name="query" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm lg:text-lg text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-700 focus:ring-blueJR focus:border-blueJR" placeholder="Cari Kata Kunci..." value="{{ request('query') ?? '' }}" />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blueJR rounded-e-lg border border-blueJR hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-700">
                        <svg class="w-3 h-3 lg:w-4 lg:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Pencarian</span>
                    </button>
                </div>
            </div>
        </form>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Daftar Buku --}}
        <div class="flex flex-wrap {{ count($books) > 2 ? 'justify-center' : 'justify-start' }} gap-3 my-8">
            @if(isset($query) && $books->isEmpty())
                <div>Tidak ada buku ditemukan.</div>
            @else
                @foreach ($books as $book)
                    <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 flex flex-col">
                        <a href="/detail-buku/{{ $book->id }}">
                            <img id="pdf-cover-{{ $book->id }}" class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover object-center skeleton"/>
                        </a>                    
                        <div class="p-5 flex flex-col flex-grow">
                            <a href="/detail-buku/{{ $book->id }}">
                                <h5 class="mb-1 lg:mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900">{{ $book->title }}</h5>
                            </a>
                            <p class="text-sm font-semibold lg:text-base text-black">Tipe Dokumen: {{ $book->type }}</p>
                            <p class="mb-1 text-sm font-semibold lg:text-base text-black">Tahun Rilis: {{ $book->release_year }}</p>
                            <p class="mb-3 text-sm lg:text-base text-gray-700 line-clamp-3 flex-grow">{{ $book->description }}</p>
                            <p class="mb-1 text-sm font-semibold lg:text-base text-black">Softskill: {{ $book->softskill }}</p>
                            
                            <div class="flex flex-col justify-center mt-auto gap-y-2">

                                {{-- Tombol Detail --}}
                                <a href="/detail-buku/{{ $book->id }}" class="inline-flex w-full items-center justify-center text-base text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-700 px-2 py-2">
                                    Detail Buku
                                </a>

                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.buku.edit', $book->id) }}" class="inline-flex w-full items-center justify-center text-base text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-700 px-2 py-2">
                                    Edit Buku
                                </a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.buku.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex w-full items-center justify-center text-base text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-700 px-2 py-2">Hapus Buku</button>
                                </form>                        
                            </div>                          
                        </div>
                    </div>
                @endforeach    
            @endif
        </div>
        

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @foreach ($books as $book) 
            const url{{ $book->id }} = '{{ asset($book->pdf_file) }}'; // Path PDF dari data buku
            let pdfDoc{{ $book->id }} = null;

            // Load PDF dan render cover image untuk buku
            pdfjsLib.getDocument(url{{ $book->id }}).promise.then(doc => {
                pdfDoc{{ $book->id }} = doc;
                renderCover{{ $book->id }}();
            });

            // Function untuk merender cover image
            function renderCover{{ $book->id }}() {
                pdfDoc{{ $book->id }}.getPage(1).then(page => {
                    const viewport = page.getViewport({ scale: 0.5 }); // Mengatur skala viewport

                    const coverCanvas = document.createElement("canvas");
                    const coverCtx = coverCanvas.getContext("2d");

                    coverCanvas.height = viewport.height; // Tinggi sesuai viewport
                    coverCanvas.width = viewport.width;   // Lebar sesuai viewport

                    page.render({
                        canvasContext: coverCtx,
                        viewport: viewport
                    }).promise.then(() => {
                        const coverImage = coverCanvas.toDataURL("image/png");
                        document.getElementById("pdf-cover-{{ $book->id }}").src = coverImage; // Update cover image untuk buku
                    });
                });
            }
        @endforeach
    });
</script>

@endsection
