<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $rota = $request->route()->getName();
        LogAcesso::create(['log' => "IP $ip acessou a rota $rota"]);
        $resposta = $next($request);
        $resposta->headers->set('X-Header-Teste', 'Valor do header de teste');
        return $resposta;
    }
}
