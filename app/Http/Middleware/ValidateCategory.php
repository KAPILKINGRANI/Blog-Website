<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Category::first()) {
            return (redirect(route('categories.create')))->with('error', 'Please First Create A Category Before Creating A Post ! No Categories are there');
        }

        return $next($request);
    }
}
