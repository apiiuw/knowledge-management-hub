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
        Schema::table('visitors', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->nullable();  // Tambahkan kolom book_id
        });
    }
    
    public function down()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropColumn('book_id');  // Menghapus kolom book_id jika rollback
        });
    }
    
};
