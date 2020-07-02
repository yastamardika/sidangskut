<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SidangReg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidang_reg', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_mhs');
            $table->string('judul_id');
            $table->string('judul_eng');
            $table->string('dosbing');
            $table->string('tgl_acc_dosbing');
            $table->string('status');
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
        //
    }
}
