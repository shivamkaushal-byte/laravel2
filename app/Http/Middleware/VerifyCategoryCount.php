<?php

namespace App\Http\Middleware;

use Closure;
use App\category;

class VerifyCategoryCount
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
      if(category::all()->count() == 0){
        session()->flash('error','first you have to create category');
         return redirect(route('categories.create'));
      }
        return $next($request);
    }
}
