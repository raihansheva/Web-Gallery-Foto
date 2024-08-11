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
        Schema::create('foto', function (Blueprint $table) {
            $table->integer('FotoID')->autoIncrement();
            $table->string('JudulFoto');
            $table->text('DeskripsiFoto');
            $table->date('TanggalUnggah');
            $table->string('LokasiFile');
            $table->integer('AlbumID');
            $table->integer('UserID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
