<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_mhs');
            $table->unsignedInteger('id_penguji1')->nullable();
            $table->unsignedInteger('id_penguji2')->nullable();
            $table->unsignedInteger('id_pembimbing')->nullable();
            $table->unsignedInteger('id_penilaian')->nullable();
            $table->date('tanggal_sidang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidangs');
    }
}
