<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Model Pengintegrasian Pendidikan Lalu Lintas Kelas VII SMP MTs',
            'type' => 'Buku Elektronik',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2017',
            'description' => 'Untuk mewujudkan tujuan pendidikan nasional tersebut diperlukan profil kualifikasi kemampuan lulusan yang dituangkan dalam standar kompetensi lulusan. Penjelasan Pasal 35 UU Sisdiknas menyebutkan bahwa ”Standar kompetensi lulusan merupakan kualifikasi kemampuan lulusan yang mencakup sikap, pengetahuan, dan keterampilan peserta didik yang harus dipenuhinya atau dicapainya dari suatu satuan pendidikan pada jenjang pendidikan dasar dan menengah.”',
            'keywords' => 'Pendidikan Lalu Lintas, E-Book, SMP, MTs, Kelas VII',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/e-buku/Model Pengintegrasian Pendidikan Lalu Lintas Kelas VII SMP MTs.pdf',
        ]);
        Book::create([
            'title' => 'Model Pengintegrasian Pendidikan Lalu Lintas Kelas 1 SD MI',
            'type' => 'Buku Elektronik',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2017',
            'description' => 'Data dari Korlantas Polri sampai dengan Desember 2014 menunjukkan bahwa pelanggaran lalu lintas baik berupa Tilang maupun teguran sebanyak 6.714.657 yang terdiri atas 4.402.715 Tilang dan 2.311.942 Teguran. Banyaknya data penindakan tersebut masih berupa tampilan permukaan dari jumlah sebenarnya pelanggaran lalu lintas yang terjadi di jalan, sehingga diperlukan langkah lebih lanjut untuk meningkatkan kesadaran masyarakat akan arti penting berlalu lintas yang berkeselamatan. .',
            'keywords' => 'Pendidikan Lalu Lintas, E-Book, SD, MI, Kelas 1',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/e-buku/Model Pengintegrasian Pendidikan Lalu Lintas Kelas 1 SD MI.pdf',
        ]);
        Book::create([
            'title' => 'Keselamatan Lalu Lintas',
            'type' => 'Buku Elektronik',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2024',
            'description' => 'Lalu lintas jalan mengacu pada pergerakan kendaraan, pejalan kaki, pengendara sepeda, dan entitas lain di jalan raya.',
            'keywords' => 'Jasa Raharja, Keselamatan Lalu Lintas, E-Book',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/e-buku/Keselamatan-LaluLintas.pdf',
        ]);
        Book::create([
            'title' => 'AWS CloudFormation User Guide',
            'type' => 'Buku Elektronik',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2018',
            'description' => 'Buku ini menjelaskan tentang AWS CloudFormation dan cara mengelola sumber daya AWS.',
            'keywords' => 'AWS, CloudFormation, Amazon Web Services, E-Book',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/e-buku/AWS CloudFormation User Guide - Amazon Web Services.pdf',
        ]);
        Book::create([
            'title' => 'Keselamatan Lalu Lintas Jalan',
            'type' => 'Artikel',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2010',
            'description' => 'Data Kepolisian RI menyebutkan, keterlibatan sepeda motor mencapai sekitar 70% dari total kasus kecelakaan lalu lintas jalan. Ditambah lagi dengan pertambahan jumlah kendaraaan bermotor roda-dua di Indonesia kini mencapai 24-30% dalam waktu satu tahun, dan tidak dibarengi dengan pembangunan infrastruktur yang memadai. Akibatnya potensi kecelakaan menjadi semakin besar (untuk roda dua, persentase kecelakaan lebih dari 67%, Dirjen Kementerian Perhubungan Darat di hadapan sekitar 40 peserta workshop tentang Keselamatan di Hotel Salak Bogor, 27-29 April 2010 oleh Bapak Suroyo Alimoeso, dan laporan Kapolri 29 Desember 2010, terjadi peningkatan angka kecelakaan dari tahu sebelumnya sebesar 1,04 % yaitu tahun 2009 sebanayak 59.164 kasus dan tahun 2010 sebanyak 61.606 kasus).',
            'keywords' => 'Jasa Raharja, Keselamatan Lalu Lintas Jalan, Artikel',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/artikel/Artikel-Keselamatan-Lalu-Lintas-Jalan.pdf',
        ]);
    }
}
