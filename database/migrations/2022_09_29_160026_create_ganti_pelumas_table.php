<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGantiPelumasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganti_pelumas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('equipment');
            $table->string('pekerjaan');
            $table->unsignedInteger('petugas_id')->references('id')->on('petugas');
            $table->unsignedInteger('pelumas_id')->references('id')->on('pelumas');
            $table->text('catatan');
            $table->string('gambar');
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
        Schema::dropIfExists('ganti_pelumas');
    }
}
