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
            $table->string('nama', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->string('nim', 50)->nullable();
            $table->string('kontak', 50)->nullable();
            $table->string('kelas', 50)->nullable();
            $table->string('kepengurusan_sebelumnya', 100);
            $table->text('tujuan');
            $table->string('file_syarat', 100);
            $table->boolean('konfirmasi')->nullable();
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
