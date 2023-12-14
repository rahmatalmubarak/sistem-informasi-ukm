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
            $table->string('judul',50);
            $table->string('headline',50);
            $table->text('content');
            $table->string('gambar',100);
            $table->string('kategori',25);
            $table->date('tgl_post');
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