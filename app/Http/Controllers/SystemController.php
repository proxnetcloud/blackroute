<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function __store($Class,Request $request)
    {
        $object = new $Class();
        $fields = $Class::fields();
        foreach ($fields as $field)
        {
            if ( isset($request->$field))
            {
                $object->$field = $request->$field;
            }
        }
        $object->save();
        return ['sucess','object'=>$object];
        //exemple 2 padronizado
        return ['error','object'=>$object];
    }

    public static function __update($Class,$id,Request $request)
    {
        $object = $Class::where('id',$id)->first();
        $fields = $Class::fields();
        foreach ($fields as $field)
        {
            if ( isset($request->$field))
            {
                $object->$field = $request->$field;
            }
        }
        $object->save();
        return ['sucess','object'=>$object];
        //exemple 2 padronizado
        return ['error','object'=>$object];
    }


    public function recorder(Request $request)
    {
        //return 'ok';
        $user = \Auth::user();

        //var_dump($request);
        //return;
        //echo $request->email;
        //return;
        //verificar se o email é único
        //$user = User::where('email', $request->email)->first();
        //if ($user) {
        //    return redirect()->route("register")
        //        ->with("message", "O email " . $request->email . " já está sendo utilizado .");
        //}
        //verificar se o email é válido?
        //if (!checkdnsrr(explode('@', $request->email)[1])) {
        //    return redirect()->route("register")
        //        ->with("message", "O domínio do email " .
        //            $request->email . " não retornou ao pedido de conexão .");
        //}
        //verificar se senha existe
        //if ( empty($request->password) )
        //{
        //    return redirect()->route("register")
        //        ->with("message", "A senha não pode ser em branca ");
        //}

        //$request->_message = "Você foi cadastrado com sucesso com nome " . $user->username . " .";
        //criar a company
        //$company = new Company();
        //$company->save();
        //$return = (new CompanyController())->_store(new Request());;
        $request->user_id = $user->id;
        $return = (new CompanyController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $company = $return['object'];
        //criar user
//        $return = (new UserController())->_store($request);
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//        }
//        $user = $return['user'];
        //$user = new User();
        //$user->password = Hash::make($request->password);
        //$user->email = $request->email;
        //$user->save();
        $request->company_id = $company->id;
        $return = (new UserController())->_update($request,$user->id);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $user = $return['object'];

        //atualizar company
//        $aux = new Request();
//        $aux->user_id = $user->id;
//        $return = (new CompanyController())->_update($aux,$company->id);;
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//        }
//        $company = $return['object'];
        //$company->user_id = $user->id;
        //$company->save();

        //return redirect()->route("login")
        //    ->with("message",
        //        "Você foi cadastrado com sucesso com nome " . $user->username . " .");
        return redirect()->back()
            ->with("message",
                "Você foi cadastrado com sucesso com email " . $user->email . " .");

        //$aux = new Request();
        //$request = $aux;
    }
}
