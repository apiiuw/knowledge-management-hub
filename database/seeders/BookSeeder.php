<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'AWS CloudFormation User Guide',
            'type' => 'E-Book',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2018',
            'description' => 'Buku ini menjelaskan tentang AWS CloudFormation dan cara mengelola sumber daya AWS.',
            'keywords' => 'AWS, CloudFormation, Amazon Web Services, E-Book',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/e-buku/AWS CloudFormation User Guide - Amazon Web Services.pdf',
        ]);
        Book::create([
            'title' => 'Keselamatan Lalu Lintas',
            'type' => 'E-Book',
            'cover_image' => 'path/to/cover_image.jpg',
            'release_year' => '2024',
            'description' => 'Lalu lintas jalan mengacu pada pergerakan kendaraan, pejalan kaki, pengendara sepeda, dan entitas lain di jalan raya atau jalan raya.',
            'keywords' => 'Jasa Raharja, Keselamatan Lalu Lintas, E-Book',
            'download_link' => 'path/to/download.pdf',
            'pdf_file' => 'assets/e-buku/Keselamatan-LaluLintas.pdf',
        ]);
    }
}
