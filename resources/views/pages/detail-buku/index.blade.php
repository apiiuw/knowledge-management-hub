@extends('layouts.main')
@section('container')

{{-- GOOGLE ANALYTICS PAGE --}}
<script>
    gtag('event', 'page_view', {
      'page_title': 'Detail Buku - {{ $book->title }}',
      'page_path': '/detail-buku/{{ $book->id }}',
    });
</script>  

<div class="bg-white w-full h-full pt-28 flex justify-center font-jakartaSans">
        <!-- Back Button -->
        <a href="/" class="absolute top-28 left-5 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition duration-200 transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0L6 9m-3 3l3 3m12-3h6m-6 0l3-3m-3 3l3 3" />
            </svg>
            Kembali
        </a>
    <div class="flex flex-col md:flex-row w-full max-w-7xl h-[90%] border border-gray-300 shadow-lg rounded-lg overflow-hidden mb-8">

        <!-- Container untuk tampilan PDF -->
        <div id="pdf-viewer" class="flex-1 mt-20 overflow-hidden bg-gray-100 relative order-1 md:order-2">
            <div class="overflow-auto h-[60%]"> <!-- Adjust height here -->
                <canvas id="pdf-canvas" class="block mx-auto"></canvas>
            </div>

            <!-- Kontrol Navigasi PDF -->
            <div class="flex items-center justify-between w-full p-4 bg-gray-200 absolute bottom-0 left-0">
                <button id="prev-page" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:bg-gray-400" disabled>Kembali</button>
                <span id="page-info" class="text-gray-600"></span>
                <button id="next-page" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:bg-gray-400">Lanjut</button>
            </div>
        </div>

        <!-- Sidebar Informasi Buku -->
        <div class="w-full md:w-1/3 p-6 bg-gray-50 border-t md:border-t-0 md:border-r border-gray-200 order-2 md:order-1">
            <h2 class="text-2xl text-center text-blueJR font-bold mb-4">{{ $book->title }}</h2>
            <div class="mb-4 flex justify-center">
                <!-- Gambar cover dari halaman pertama PDF -->
                <img id="pdf-cover" src="{{ asset($book->cover_image) }}" alt="Cover Buku" class="w-2/3 max-w-xs rounded-lg shadow-md mb-2">
            </div>

            <p class="text-gray-700 mb-2"><strong>Jenis Buku:</strong> {{ $book->type }}</p>
            <p class="text-gray-700 mb-2"><strong>Tahun Rilis:</strong> {{ $book->release_year }}</p>
            <p class="text-gray-600 mb-4">
                <strong>Deskripsi:</strong> {{ $book->description }}
            </p>
            <p class="text-gray-600 mb-4">
                <strong>Kata Kunci:</strong> {{ $book->keywords }}
            </p>
            {{-- <p class="text-gray-600 mb-4">
                <strong>Jumlah Pengunjung:</strong> {{ $pageviews }}
            </p> --}}
            <a href="{{ asset($book->pdf_file) }}" target="_blank" class="block text-center px-4 py-2 bg-blueJR text-white rounded hover:bg-blue-700 transition duration-200 mb-2">
                Lihat Detail
            </a>
            <a href="{{ asset($book->pdf_file) }}" download="{{ $book->type }} - {{ $book->title }}.pdf" target="_blank" class="block text-center px-4 py-2 bg-blueJR text-white rounded hover:bg-blue-700 transition duration-200">
                Unduh {{ $book->type }}
            </a>
        </div>
    </div>
</div>

<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<script>
    const url = '{{ asset($book->pdf_file) }}'; // Use the PDF file path from the book data

    let pdfDoc = null,
        pageNum = 1,
        canvas = document.getElementById('pdf-canvas'),
        ctx = canvas.getContext('2d');

    // Fungsi untuk menampilkan halaman pertama PDF sebagai cover
    function renderCover() {
        pdfDoc.getPage(1).then(page => {
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
                document.getElementById("pdf-cover").src = coverImage;
            });
        });
    }

    // Fungsi untuk merender halaman di tampilan utama
    function renderPage(num) {
        pdfDoc.getPage(num).then(page => {
            const viewport = page.getViewport({ scale: 1 });
            const scale = canvas.parentElement.clientWidth / viewport.width;
            const scaledViewport = page.getViewport({ scale: scale });

            canvas.height = scaledViewport.height;
            canvas.width = scaledViewport.width;

            const renderContext = {
                canvasContext: ctx,
                viewport: scaledViewport
            };

            canvas.style.opacity = 0;
            setTimeout(() => {
                page.render(renderContext).promise.then(() => {
                    document.getElementById('page-info').textContent = `Halaman ${pageNum} dari ${pdfDoc.numPages}`;
                    document.getElementById('prev-page').disabled = (pageNum <= 1);
                    document.getElementById('next-page').disabled = (pageNum >= pdfDoc.numPages);
                    canvas.style.opacity = 1;
                });
            }, 300);
        });
    }

    // Load PDF dan render halaman pertama sebagai cover
    pdfjsLib.getDocument(url).promise.then(doc => {
        pdfDoc = doc;
        renderCover(); // Menampilkan cover dari halaman pertama
        document.getElementById('page-info').textContent = `Halaman ${pageNum} dari ${pdfDoc.numPages}`;
        renderPage(pageNum);
    });

    // Navigasi halaman
    document.getElementById('prev-page').addEventListener('click', () => {
        if (pageNum <= 1) return;
        pageNum--;
        renderPage(pageNum);
    });

    document.getElementById('next-page').addEventListener('click', () => {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        renderPage(pageNum);
    });
</script>

<style>
    #pdf-canvas {
        transition: opacity 0.3s ease-in-out;
    }

    .overflow-auto {
        overflow: auto;
        height: calc(100% - 56px);
    }
</style>

@endsection
