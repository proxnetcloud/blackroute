<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth\RegisterController;

//use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->phone == '') {
            return Auth\RegisterController::_create();
        }
        //return redirect()->route('');
        return view('dashboard');
    }

    //verifica se o user já preencheu os dados
    //...e redireciona para o local apropriado
    public function initial()
    {
        return view('auth.form');
        //return view('form',
        //    [
        //        'route'=>'',
        //        'fields'=>
        //            [
        //                'type' => '',
        //                'name' => '',
        //                'label' => '',
        //                'placeholder' => '',
        //                'options' =>
        //                    [
        //                        'name' => '',
        //                        'text' => '',
        //                    ],
        //            ]
        //    ]);
        return redirect()->route('dashboard');
    }
}
