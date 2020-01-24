<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Laravel extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function redirecionar()
    {
        return $this;
        //return redirect();
    }

    //public
}
