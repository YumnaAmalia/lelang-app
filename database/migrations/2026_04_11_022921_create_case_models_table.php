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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('nama_terpidana');
            $table->string('nomor_putusan');
            $table->date('tanggal_putusan');
            $table->string('jenis_perkara');
            $table->string('wilayah_putusan');
            $table->decimal('uang_pengganti',15,2)->nullable();
            $table->decimal('uang_dibayar',15,2)->nullable();
            $table->string('lama_pidana')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_models');
    }
};
