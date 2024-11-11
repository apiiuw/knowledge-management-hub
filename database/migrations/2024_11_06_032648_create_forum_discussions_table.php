<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('forum_discussions', function (Blueprint $table) {
            $table->id();
            $table->string('question');  // Kolom untuk pertanyaan
            $table->date('date');        // Kolom untuk tanggal
            $table->string('status');    // Kolom untuk status (misalnya: 'Belum Terjawab' atau 'Terjawab')
            $table->text('jawaban')->nullable();  // Kolom untuk jawaban, dengan nullable jika belum ada jawaban
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forum_discussions', function (Blueprint $table) {
            $table->dropColumn('jawaban');  // Menghapus kolom jawaban
        });
    }
};
