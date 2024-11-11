<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumDiscussionSeeder extends Seeder
{
    public function run()
    {
        DB::table('forum_discussions')->insert([
            ['question' => 'Bagaimana jika menambahkan buku tentang penggunaan helm yang baik dan benar?', 'date' => '2024-11-01', 'status' => 'Belum Terjawab', 'jawaban' => null],
            ['question' => 'Apakah dengan saya membaca dari platform Edukasi Lalu lintas akan menambah wawasan saya?', 'date' => '2024-11-02', 'status' => 'Terjawab', 'jawaban' => 'Platform Edukasi Lalu Lintas sangat sangat membantu anda dalam menambah wawasan tentang keamanan berkendara!'],
            ['question' => 'Platform yang sangat baik dan mendidik!', 'date' => '2024-11-03', 'status' => 'Belum Terjawab', 'jawaban' => null],
            ['question' => 'Bagaimana jika saya inginn request buku pada platform Edukasi Lalu Lintas?', 'date' => '2024-11-02', 'status' => 'Terjawab', 'jawaban' => 'Temen-temen bisa memberikan saran buku yang dapat kami upload pada platform Edukasi Lalu Lintas.'],
            ['question' => 'Bagaimana cara membagikan buku yang kita baca dari platform ini?', 'date' => '2024-11-02', 'status' => 'Terjawab', 'jawaban' => 'Membagikan buku yang telah dibaca dari platform Edukasi Lalu Lintas sangat diperbolehkan!'],

        ]);
    }
}
