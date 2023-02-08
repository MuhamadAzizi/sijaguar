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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('no_ruangan');
            $table->foreignId('jenis_ruangan_id')->constrained('jenis_ruangan')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('ruangan', function (Blueprint $table) {
            $table->dropForeign(['jenis_ruangan_id']);
        });
        Schema::dropIfExists('ruangan');
    }
};
