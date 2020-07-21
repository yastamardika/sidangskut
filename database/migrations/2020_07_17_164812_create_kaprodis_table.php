<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaprodisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaprodis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_prodi')->unsigned();
            $table->foreign('id_prodi')
            ->references('id')
            ->on('prodis')
            ->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
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
        Schema::drop('kaprodis');
    }
}
