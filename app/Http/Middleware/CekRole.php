<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next,...$role)
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                // Logic for both admin and user roles
                return $next($request);
            } else if ( auth()->user()->role === 'user') {
                // Logic for both admin and user roles
                return $next($request);
            } 
            
            else {
                // Handle other roles if needed
                return abort(403, 'Unauthorized action.'); // Or redirect to an unauthorized page
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->route('login'); // Replace 'login' with the desired login route
        }
        
            
            // Check if the user's role is 'admin'

            //dd( auth()->user()->role === 'admin');
            // dd($role);

        //     if( auth()->user()->role === 'admin') {
        //         return $next($request);
        //     }
        

        // return abort(403, 'Unauthorized action.');
        }}
