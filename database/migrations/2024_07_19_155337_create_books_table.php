<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('no_book');
            $table->string('title_book');
            $table->integer('year_publish');
            $table->string('book_publisher');
            $table->enum('status', ['rusak', 'musnah', 'layak']);
            $table->enum('tipe_book', ['tatalaksana', 'pelayanan_public ']);
            $table->string('foto');
            $table->unsignedBigInteger('cupboard_number_id');
            $table->timestamps();

            $table->foreign('cupboard_number_id')->references('id')->on('cupboard_numbers');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
