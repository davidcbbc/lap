<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('link')->nullable();
            $table->enum('fase', ['REGISTER', 'STARTED', 'FINISHED'])->default('REGISTER');
            $table->integer('max_equipas')->default(5);
            $table->integer('num_equipas')->default(0);
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('premio')->default('5 eur');
            $table->string('jogo')->default('CS:GO');
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
        Schema::dropIfExists('torneios');
    }
}
