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
    Schema::create('infos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique();
        $table->date('tanggal_akad')->nullable();
        $table->string('jam_akad')->nullable();
        $table->date('tanggal_resepsi')->nullable();
        $table->string('jam_resepsi')->nullable();
        $table->text('alamat')->nullable();
        $table->text('google_maps')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
