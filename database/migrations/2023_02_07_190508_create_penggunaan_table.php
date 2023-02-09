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
        Schema::create('penggunaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ruangan_id')->constrained('ruangan')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('waktu_masuk');
            $table->dateTime('waktu_keluar');
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak', 'Selesai'])->default('Menunggu');
            $table->string('keterangan');
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
        Schema::table('penggunaan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['ruangan_id']);
        });
        Schema::dropIfExists('peminjaman');
    }
};
