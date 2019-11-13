<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Crypt;
class MustLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (! Auth::check()) {
            return redirect('account/login')->with('error','Anda harus login terlebih dahulu!');
        }
        if(Auth::check() == true && Auth::user()->activated == false){
            $id = Auth::user()->id;
            Auth::logout();
            return redirect('account/verify')->with('id',Crypt::encrypt($id));
        }
        return $next($request);
    }
}
