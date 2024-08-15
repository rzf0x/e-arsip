<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('no_book');
            $table->string('title_book');
            $table->integer('year_publish');
            $table->string('book_publisher');
            $table->enum('status', ['rusak', 'hilang', 'musnah', 'layak']);
            $table->string('foto');
            $table->unsignedBigInteger('cupboard_number_id');
            $table->timestamps();

            $table->foreign('cupboard_number_id')->references('id')->on('cupboard_numbers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
