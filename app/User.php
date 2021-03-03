<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use App\Notifications\CostumRegisterNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nick', 'numero_aluno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CostumRegisterNotification($this->name));
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasNotification(){
        return $this->unreadNotifications->count() > 0;
    }

    public function getNotificationsCount(){
        return $this->unreadNotifications->count();
    }

    public function equipa()
    {
        return $this->belongsTo(\App\Equipa::class);
    }

    /**
     * @return bool boolean que valida se e capitao da sua equipa
     */
    public function isCapitao()
    {
        $equipa = $this->equipa;
        if ($equipa == null) return false;
        if ($equipa->user_id == $this->id) return true;
        return false;
    }

    public function getNomeEquipa()
    {
        if($this->equipa == null) return "-";
        return $this->equipa->nome;
    }


    public function torneiosFifa() {
        return $this->belongsToMany(\App\Torneio::class,'torneios_jogadores_fifa');
    }


}
