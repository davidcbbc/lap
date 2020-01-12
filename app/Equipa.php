<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipa extends Model
{
    //

    public function users()     {
        return $this->hasMany(\App\User::class);
    }

    public function getCapitao(){
        return \App\User::find($this->user_id);
    }



}
