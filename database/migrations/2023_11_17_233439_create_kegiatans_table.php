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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ormawa_id')->unsigned();
            $table->string('nama',50);
            $table->string('penanggung_jawab',50);
            $table->string('jenis',20);
            $table->text('deskripsi');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->text('tempat');
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
        Schema::dropIfExists('kegiatans');
    }
};
