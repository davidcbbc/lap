<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneio extends Model
{
    //

    public function partidas(){
        return $this->hasMany(\App\Partida::class);
    }
}
