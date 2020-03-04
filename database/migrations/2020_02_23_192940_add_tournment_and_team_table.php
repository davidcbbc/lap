<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTournmentAndTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneios_equipas', function (Blueprint $table) {
            $table->unsignedBigInteger("equipa_id");
            $table->foreign('equipa_id')->references('id')->on('equipas')->onDelete('cascade');
            $table->unsignedBigInteger("torneio_id");
            $table->foreign('torneio_id')->references('id')->on('torneios');
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
