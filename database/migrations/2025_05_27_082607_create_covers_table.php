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
    Schema::create('covers', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->unique(); // setiap user hanya 1 cover
    $table->string('nama_pria');
    $table->string('nama_wanita');
    $table->date('tanggal_acara');
    $table->timestamps();
});

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covers');
    }
};
