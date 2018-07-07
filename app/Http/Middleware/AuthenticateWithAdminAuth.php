<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateWithAdminAuth {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    if (auth()->user() && auth()->user()->isAdmin()) {
      return redirect()
        ->back()
        ->with([
          'stringError' => 'Voor deze URL moet u administrator zijn!',
        ]);
    }

    return $next($request);
  }
}
