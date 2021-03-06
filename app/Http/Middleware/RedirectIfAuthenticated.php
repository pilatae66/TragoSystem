<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'students':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('student.dashboard');
              }
              break;
            case 'instructors':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('instructor.dashboard');
              }
              break;
            case 'admins':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
              }
              break;
            default:
              if (Auth::guard($guard)->check()) {
                  return redirect()->route('home');
              }
              break;
          }
          return $next($request);
    }
}
