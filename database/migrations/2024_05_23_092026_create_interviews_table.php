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
        Schema::create('interviews', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('foto'); // Nama file gambar
            $table->string('lowongan_id');
            $table->foreign('lowongan_id')->references('id')->on('lowongans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->date('tglLahir');
            $table->string('pend');
            $table->text('cerita');
            $table->text('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
