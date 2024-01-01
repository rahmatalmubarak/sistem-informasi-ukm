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
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ormawa_id')->unsigned();
            $table->string('judul',255);
            $table->string('headline',255)->nullable();
            $table->text('content')->nullable();
            $table->string('gambar',255)->nullable();
            $table->string('kategori',50);
            $table->date('tgl_post')->nullable();
            $table->timestamps();

            $table->foreign('ormawa_id')->references('id')->on('ormawas')->cascadeOnDelete()->cascadeOnUpdate();
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postingans');
    }
};
