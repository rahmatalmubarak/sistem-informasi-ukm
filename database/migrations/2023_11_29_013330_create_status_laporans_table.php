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
        Schema::create('status_laporans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('laporan_id')->unsigned();
            $table->boolean('status');
            $table->text('catatan')->nullable();
            $table->string('sk',100)->nullable();
            $table->timestamps();

            $table->foreign('laporan_id')->references('id')->on('laporans')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_laporans');
    }
};
