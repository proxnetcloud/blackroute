<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Foi criado com o intuito de traduzir o sistema...
//...mas como o programador após aprender precisa lidar com o Laravel em inglês...
//...e para não ter que novamente se readaptar ao Laravel...
//...então decidiu-se traduzir somente o banco de dados e as variaveis pessoais
class UsuarioController extends Controller
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
        return new UserController();
    }
}
