<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfEquipa
{
    /**
     * Verifica se um utilizador tem equipa ou não , se não tiver envia para a página de criar equipa
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->equipa_id != null) return redirect('/home');
        return $next($request);
    }
}
