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
        Schema::create('photo_postingans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('postingan_id')->unsigned();
            $table->string('gambar',150);
            $table->timestamps();
            $table->foreign('postingan_id')->references('id')->on('postingans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_postingans');
    }
};
