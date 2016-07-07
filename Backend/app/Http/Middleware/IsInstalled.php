<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class IsInstalled
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
        $tables = DB::select('SHOW TABLES');
        if(empty($tables)) {
            if ($request->ajax()) {
                return response('Server setup needed.', 500);
            } else {
                return redirect('/install');
            }
        }
        
        return $next($request);
    }
}
