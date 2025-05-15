<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->age<25 && $request->age>18){
            return $next($request); // Allow the request to continue
        }else{
            return redirect()->route('student.create')->withErrors([
                'age' => 'You must be at least 18 years old or less than 25 to proceed.',
            ]);
        }
    }
}
