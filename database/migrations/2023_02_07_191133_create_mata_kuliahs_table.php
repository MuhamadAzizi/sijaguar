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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->char('kode_mk', 8);
            $table->string('nama_mk');
            $table->foreignId('dosen_id')->nullable()->constrained('dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sks');
            $table->enum('t_p', ['T', 'P']);
            $table->integer('semester');
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
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->dropForeign(['dosen_id']);
        });
        Schema::dropIfExists('mata_kuliah');
    }
};