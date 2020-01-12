<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCapitao
{
    /**
     * Verifica se o utilizador e capitao de equipa
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->equipa == null) return redirect('/equipa/create');
        if(Auth::user()->equipa->user_id == Auth::user()->id) return $next($request);
        return redirect('/home');
    }
}
