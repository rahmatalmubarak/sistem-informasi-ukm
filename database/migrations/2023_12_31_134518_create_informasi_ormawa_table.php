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
        Schema::create('informasi_ormawas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ormawa_id')->unsigned();
            $table->text('dasar_hukum');
            $table->text('visi');
            $table->text('misi');
            $table->text('proker');
            $table->text('informasi');
            $table->string('foto_pengurus',150);
            $table->timestamps();

            $table->foreign('ormawa_id')->references('id')->on('ormawas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_ormawas');
    }
};
