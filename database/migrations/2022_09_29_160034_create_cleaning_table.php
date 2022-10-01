<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('equipment');
            $table->string('pekerjaan');
            $table->unsignedInteger('petugas_id')->references('id')->on('petugas');
            $table->string('gambar_sebelum');
            $table->string('gambar_sesudah');
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
        Schema::dropIfExists('cleaning');
    }
}
