<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('torneio_id');
            $table->foreign('torneio_id')->references('id')->on('torneios');
            $table->unsignedBigInteger('equipa1_id');
            $table->foreign('equipa1_id')->references('id')->on('equipas');
            $table->unsignedBigInteger('equipa2_id');
            $table->foreign('equipa2_id')->references('id')->on('equipas');
            $table->string('mapa')->default('dust2');
            $table->unsignedBigInteger('mvp_id')->nullable();
            $table->foreign('mvp_id')->references('id')->on('users');
            $table->integer('pts_equipa1')->default(0);
            $table->integer('pts_equipa2')->default(0);
            $table->unsignedBigInteger('vencedor_id');
            $table->foreign('vencedor_id')->references('id')->on('equipas');
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
        Schema::dropIfExists('partidas');
    }
}
