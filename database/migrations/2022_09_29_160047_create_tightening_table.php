<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTighteningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tightening', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            // $table->string('equipment');
            $table->unsignedInteger('equipment_id')->references('id')->on('equipment');
            $table->string('pekerjaan');
            $table->unsignedInteger('petugas_id')->references('id')->on('petugas');
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
        Schema::dropIfExists('tightening');
    }
}
