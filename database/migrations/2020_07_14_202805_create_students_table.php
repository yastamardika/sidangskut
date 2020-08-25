<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('nama_mhs');
            $table->string('email');
            $table->string('nim');
            $table->bigInteger('id_prodi')->unsigned();
            $table->string('judul_idn');
            $table->string('judul_eng');
            $table->bigInteger('pembimbing')->unsigned();
            $table->string('nomerhp');
            $table->date('tgl_acc_dosbing');
            $table->bigInteger('id_status')->unsigned()->default('1');
            $table->string('file_cover_ta');
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
        Schema::drop('mahasiswa');
    }
}
