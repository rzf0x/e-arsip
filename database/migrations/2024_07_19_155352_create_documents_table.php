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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('title');
            $table->text('desc');
            $table->integer('year');
            $table->string('sender');
            $table->string('file');
            $table->enum('status', ['aktif', 'inaktif']);
            $table->enum('tipe_doc', ['tatalaksana_pelayanan_publik', 'kelembagaan_anjab', 'inovasi_pelayanan_publik', 'peningkatan_kinerja_reformasi_birokrasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
