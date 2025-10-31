<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkcategoryExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Category::count() === 0) {
        return redirect()->route('categories.index')->with('error','No hay categorías. Cree una antes de agregar productos.');
        }       
        return $next($request);
    }
}
