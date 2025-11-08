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
    Schema::table('homes', function (Blueprint $table) {
        $table->string('nama_lengkap_pria')->nullable();
        $table->string('nama_lengkap_wanita')->nullable();
    });
}

public function down()
{
    Schema::table('homes', function (Blueprint $table) {
        $table->dropColumn(['nama_lengkap_pria', 'nama_lengkap_wanita']);
    });
}

};
