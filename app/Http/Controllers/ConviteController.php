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


    public function showRead(){
        $user = Auth::user();
        $total = $user->notifications()->whereNotNull('read_at')->count();
        $notifications = $user->notifications()->whereNotNull('read_at')->orderBy('created_at')->paginate(5);
        return view('notifications',["notifications"=>$notifications, "type"=>"read", "total" => $total]);
    }
    
    //shows unread notifications
    public function show(){
        $user = Auth::user();
        //Checkar se existe alguma notificacao que nao seja valida
        $this->validateNotifications($user);
        $total = $user->notifications()->whereNull('read_at')->count();
        $notifications = $user->notifications()->whereNull('read_at')->orderBy('created_at')->paginate(5);
        return view('notifications',["notifications"=>$notifications, "type"=>"unread" , "total" => $total]);
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
