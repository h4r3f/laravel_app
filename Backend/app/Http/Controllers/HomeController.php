<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class HomeController extends Controller
{   
    /**
     * Home Page Controller
     * @return void
     */     
    public function index(Request $request)
    {   
        $tables = DB::select('SHOW TABLES');
        $installed = !empty($tables);

        if($installed){
            return redirect('/login');
        }

        return view('pages.home');
    }
}
