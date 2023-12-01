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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ormawa_id')->unsigned();
            $table->string('nama', 25)->nullable();
            $table->string('email', 50)->unique();
            $table->string('nim', 15)->nullable();
            $table->string('kontak', 15)->nullable();
            $table->string('kelas', 15)->nullable();
            $table->string('kepengurusan_sebelumnya', 100);
            $table->string('tujuan', 100);
            $table->string('file_syarat', 100);
            $table->boolean('konfirmasi', 50);
            $table->timestamps();

            $table->foreign('ormawa_id')->references('id')->on('ormawas')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
};
