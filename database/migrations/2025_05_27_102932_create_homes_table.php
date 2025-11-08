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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('judul')->nullable();
            $table->string('lokasi_tanggal')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('ortu_pria')->nullable();
            $table->string('ortu_wanita')->nullable();
            $table->string('foto_pria')->nullable();
            $table->string('foto_wanita')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
