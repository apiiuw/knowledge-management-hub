<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyKeywordsColumnInBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Change the 'keywords' column to be of type TEXT
            $table->text('keywords')->change();
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Revert 'keywords' column back to string if needed
            $table->string('keywords', 255)->change();
        });
    }
}
