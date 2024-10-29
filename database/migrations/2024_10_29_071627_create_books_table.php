<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Buku
            $table->string('type'); // Jenis Buku
            $table->string('cover_image'); // URL untuk Cover Buku
            $table->year('release_year'); // Tahun Rilis
            $table->text('description'); // Deskripsi Buku
            $table->string('keywords'); // Kata Kunci
            $table->string('download_link'); // URL untuk Download PDF
            $table->string('pdf_file'); // Path untuk File PDF
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
