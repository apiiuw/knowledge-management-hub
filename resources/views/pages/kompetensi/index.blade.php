@extends('layouts.main')
@section('container')

<div class="bg-white w-full min-h-screen pt-16 md:pt-20">

    <section class="bg-white">
        <div class="container py-10 mx-auto">
            <header class="bg-white px-6 dark:bg-gray-900">
                <div class="container flex flex-col justify-center px-6 py-10 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
                    <div class="w-full lg:w-1/2">
                        <div>
                            <h1 class="text-3xl font-semibold tracking-wide text-gray-800 dark:text-white lg:text-4xl">Temukan softskillmu bersama<br>Knowledge Management Hub</h1>
                            <p class="mt-4 text-gray-600 dark:text-gray-300">Memperluas kemampuan anda bersama kami, ayo temukan softskill yang anda minati!</p>

                            <!-- Menambahkan div untuk membuat dua kolom -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Achievement Orientation</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Professionalisme</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Customer Service Orientation</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Continuous Learning</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Relationship Building</span>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Driving Change</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Problem Solving</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Business Acumen</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Digital Leadership</span>
                                    </div>
                                    <div class="flex items-center text-gray-800 dark:text-gray-200">
                                        <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="px-3">Strategic Orientation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                        <img class="object-cover w-full h-full max-w-2xl rounded-md mt-5 lg:mt-0" src="{{ asset('assets/images/pages/kompetensi/kompetensi1.jpg') }}" alt="glasses photo">
                    </div>
                </div>
            </header>

            @foreach ($books as $softskill => $bookList)
            <div class="{{ $loop->even ? 'bg-white text-blueJR' : 'bg-blueJR text-white' }} flex flex-col justify-center px-5">
                <h1 class="text-3xl font-bold text-center mt-3">{{ $softskill }}</h1>
                <p class="mt-4 px-10 text-center">
                    @switch($softskill)
                        @case('Achievement Orientation')
                            Kemampuan untuk menetapkan dan mencapai target dengan penuh dedikasi. Soft skill ini menekankan fokus pada hasil, di mana seseorang terus-menerus mencari cara untuk meningkatkan kinerja, mengatasi tantangan, dan mencapai standar yang lebih tinggi dalam pekerjaan.
                            @break
                        @case('Professionalisme')
                            Sikap dan perilaku yang mencerminkan etika kerja yang tinggi, keandalan, dan penghormatan terhadap nilai-nilai organisasi. Profesionalisme mencakup konsistensi dalam kualitas pekerjaan, menjaga integritas, serta berkomunikasi secara efektif dan sopan di berbagai situasi.
                            @break
                        @case('Customer Service Orientation')
                            Kemampuan untuk memahami dan memenuhi kebutuhan pelanggan secara proaktif. Soft skill ini mencakup empati, mendengarkan dengan baik, memberikan solusi yang relevan, dan memastikan pengalaman pelanggan yang positif, sehingga menciptakan loyalitas jangka panjang.
                            @break
                        @case('Continuous Learning')
                            Semangat untuk terus belajar dan berkembang sepanjang waktu. Soft skill ini mengacu pada keinginan untuk memperbarui pengetahuan, mempelajari keterampilan baru, dan menerima perubahan untuk tetap relevan dalam lingkungan yang terus berkembang.
                            @break
                        @case('Relationship Building')
                            Kemampuan untuk menjalin, memelihara, dan memperkuat hubungan positif dengan orang lain. Relationship building melibatkan komunikasi yang efektif, empati, dan kemampuan untuk membangun rasa saling percaya, baik dengan kolega, mitra, maupun pemangku kepentingan.
                            @break
                        @case('Driving Change')
                            Kompetensi dalam menginisiasi dan memimpin perubahan dalam organisasi atau situasi tertentu. Soft skill ini mencakup kemampuan untuk beradaptasi dengan cepat terhadap perubahan, menginspirasi orang lain untuk menerima perubahan, dan menghadapi tantangan dengan sikap positif.
                            @break
                        @case('Problem Solving')
                            Kemampuan untuk menganalisis masalah secara kritis, mengidentifikasi akar penyebab, dan menemukan solusi yang praktis dan inovatif. Soft skill ini membutuhkan pemikiran logis, kreativitas, serta kemampuan mengambil keputusan yang tepat dalam situasi kompleks.
                            @break
                        @case('Business Acumen')
                            Pemahaman yang mendalam tentang cara kerja bisnis, termasuk aspek keuangan, strategi, dan operasional. Soft skill ini memungkinkan seseorang untuk melihat gambaran besar, memahami prioritas bisnis, dan membuat keputusan yang mendukung tujuan organisasi secara keseluruhan.
                            @break
                        @case('Digital Leadership')
                            Kemampuan untuk memimpin dan mengelola tim dalam ekosistem digital. Ini mencakup pemahaman terhadap teknologi, kemampuan untuk mengadopsi alat digital baru, serta menciptakan lingkungan kerja yang mendukung inovasi dan kolaborasi virtual.
                            @break
                        @case('Strategic Orientation')
                            Kemampuan untuk berpikir jangka panjang dan merancang strategi yang selaras dengan visi organisasi. Strategic orientation mencakup analisis tren, identifikasi peluang, dan pengambilan keputusan yang mempertimbangkan dampak strategis di masa depan.
                            @break
                        @default
                            Deskripsi untuk softskill ini belum tersedia.
                    @endswitch
                </p>
                <div class="flex flex-wrap justify-center gap-3 my-8">
                    @foreach ($bookList as $book)
                        <div class="w-full lg:w-72 bg-white border border-gray-200 rounded-lg shadow-md shadow-black/30 flex flex-col">
                            <a href="/detail-buku/{{ $book->id }}">
                                <canvas id="pdf-canvas-{{ $book->id }}" class="rounded-t-lg w-full aspect-square lg:w-72 lg:h-72 object-cover skeleton"></canvas>                            
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
                </div>
            </div>
            @endforeach
        </div>
    </section>

<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        @foreach ($books as $softskill => $bookList)
            @foreach ($bookList as $book)
                const url{{ $book->id }} = '{{ asset($book->pdf_file) }}'; // Path to the PDF file
                let pdfDoc{{ $book->id }} = null;

                // Load PDF and render the first page
                pdfjsLib.getDocument(url{{ $book->id }}).promise.then(doc => {
                    pdfDoc{{ $book->id }} = doc;
                    renderCover{{ $book->id }}();
                });

                function renderCover{{ $book->id }}() {
                    pdfDoc{{ $book->id }}.getPage(1).then(page => {
                        const viewport = page.getViewport({ scale: 1 }); // Set scale for cover
                        const canvas = document.getElementById("pdf-canvas-{{ $book->id }}");
                        const context = canvas.getContext("2d");

                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });
                    });
                }
            @endforeach
        @endforeach
    });
</script>

</div>

@endsection
