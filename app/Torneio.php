<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneio extends Model
{
    //

    public function partidas(){
        return $this->hasMany(\App\Partida::class);
    }


    public function equipas(){
        return $this->belongsToMany(\App\Equipa::class,'torneios_equipas');
    }

}
