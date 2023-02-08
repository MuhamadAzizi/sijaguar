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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruangan_id')->constrained('ruangan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->foreignId('tahun_akademik_id')->constrained('tahun_akademik')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign(['ruangan_id']);
            $table->dropForeign(['mata_kuliah_id']);
            $table->dropForeign(['tahun_akademik_id']);
        });
        Schema::dropIfExists('jadwal');
    }
};
