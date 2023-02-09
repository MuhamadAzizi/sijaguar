<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['Hadir', 'Tidak Hadir', 'Menunggu'])->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verifikasi_jadwal', function (Blueprint $table) {
            $table->dropForeign(['jadwal_id']);
        });
        Schema::dropIfExists('verifikasi_jadwal');
    }
};
