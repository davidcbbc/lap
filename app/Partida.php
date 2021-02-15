<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    //

    public function torneio()
    {
        return $this->belongsTo(\App\Torneio::class);
    }
}
