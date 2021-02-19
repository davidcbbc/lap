<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConviteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(){
        $user = Auth::user();
        //Checkar se existe alguma notificacao que nao seja valida
        $this->validateNotifications($user);
        $notifications = $user->unreadNotifications;
        return view('notifications',compact('notifications'));
    }

    // Check if some notifications are valid or no
    private function validateNotifications($user){
        $notifications = $user->unreadNotifications;
        foreach($notifications as $notif){
            if($notif->type == "App\Notifications\ConviteEquipa"){
                // check if team still exists
                $equipa = \App\Equipa::find($notif->data['equipa_id']);
                if($equipa==null) $notif->markAsRead();
            }
        }
    }

}
