<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Address;
use App\Error;

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

        $return = (new AddressController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $address = $return['object'];
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

    public static function __create($ModelsFields,$route)
    {
        $aux = [];
        foreach ($ModelsFields as $ModelFields)
        {
            $fields = (Object)$ModelFields['Model']::form()[0];
            foreach ($fields as $field)
            {
                $field = (Object)$field;

                $aux2 = [];
                foreach ($ModelFields['fields'] as $field2)
                {
                    $aux2[] = [$field->name,$field2];
                }
                $ModelFields['fields'] = $aux2;

                if ( array_search(1,
                        array_map(function ($name,$field) {
                            if ( $name != $field)
                            {
                                return 1;
                            }
                            else
                            {
                                return 0;
                            }
                        },
                            $ModelFields['fields'])) != false or $ModelFields['fields'])
                {
                    continue;
                }
//                if ( $field->name != 'cpf'
//                    &&
//                    $field->name != 'rg'
//                    &&
//                    $field->name != 'phone'
//                )
//                {
//                    continue;
//                }
                $options = [];
                if ( $field->type == 'select' or $field->type == 'radio' )
                {
                    foreach ($field->options as $option )
                    {
                        $options[] = [
                            'value' => $option->value,
                            'text' => $option->text,
                        ];
                    }
                }
                $aux[] = [
                    'type' => $field->type,
                    'name' => $field->name,
                    'label' => $field->label,
                    'placeholder' => $field->placeholder,
                    'options' => $options,
                ];
            }
        }
        $fields = $aux;
//        return ['error','object'=>$object];

        return view('form',
            [
                'route'=>$route,
                'fields'=> $fields,
            ]);
    }

    public static function form($params)
    {
//        $ModelsFieldsIDs = $params['ModelsFieldsIDs'] ;
        $route = $params['route'] ;
        $form = $params['form'] ;

//        $ModelsFields = $ModelsFieldsIDs;
        $data = [];
        $values = $data;
        $tabs = [];

        foreach ($params['tabs'] as $tab) {
            $aux4 = [];
            $aux4['name'] = $tab['name'];
            $aux4['label'] = $tab['label'];
            $aux = [];

            $ModelsFields = $tab['fields'];
            foreach ($ModelsFields as $ModelFields) {
                $ModelFieldsID = $ModelFields;

//                $error = new Error();
//                $error->value = json_encode($ModelFields);
//                $error->save();

                $fields = (Object)$ModelFields['Model']::form()[0];
                $aux2 = '';
                if (isset($ModelFieldsID['id'])) {
                    $aux2 = $ModelFields['Model']::where('id', $ModelFieldsID['id'])->first();
                }
                foreach ($fields as $field) {
                    $field = (Object)$field;
//                $data[$field->name] = $aux2->$($field->name);
//                $data[$field->name] = $aux2->$$field->name;
                    $name2 = $field->name;
                    if (isset($aux2->$name2)) {
                        $data[$field->name] = $aux2->$name2;
                    }

                    $aux2 = [];
                    foreach ($ModelFields['fields'] as $field2) {
                        $aux2[] = [$field->name, $field2];
                    }
                    //$ModelFields['fields'] = $aux2;

//                if ( array_search(1,
////                        array_map(function ($name,$field) {
//                        array_map(function ($params) {
////                            var_dump($params);
////                            return '<br>ok';
////                            if ( $name != $field)
//                            if ( $params[0] != $params[1])
//                            {
//                                return 1;
//                            }
//                            else
//                            {
//                                return 0;
//                            }
//                        },
////                            $ModelFields['fields'])) != false or $ModelFields['fields'])
////                            $ModelFields['fields'])) != false )
//                            $aux2)) != false )
//                {
////                    continue;
//                }

                    $arr = array_map(function ($params) {
//                    $error = new Error();
//                    $error->value = json_encode($params);
//                    $error->save();
//
//                    $error = new Error();
//                    $error->value = $params[0];
//                    $error->save();
//
//                    $error = new Error();
//                    $error->value = $params[1];
//                    $error->save();

//                            header("Location: https://localhost/".json_encode($params));
//                            var_dump($params);
//                            return '<br>ok';
//                            if ( $name != $field)
                        if ($params[0] == $params[1]) {
                            return 1;
                        } else {
                            return 0;
                        }
                    },
//                            $ModelFields['fields'])) != false or $ModelFields['fields'])
//                            $ModelFields['fields'])) != false )
                        $aux2);

//                    $error = new Error();
//                    $error->value = json_encode($arr);
//                    $error->save();

//                    $error = new Error();
//                    $error->value = array_search(1, $arr);
//                    $error->save();

                    if (array_search(1, $arr) === false and $ModelFields['fields'] != []) {
                        continue;
                    }
//                if ( $field->name != 'cpf'
//                    &&
//                    $field->name != 'rg'
//                    &&
//                    $field->name != 'phone'
//                )
//                {
//                    continue;
//                }
                    $options = [];
                    if ($field->type == 'select' or $field->type == 'radio') {
                        foreach ($field->options as $option) {
                            $options[] = [
                                'value' => $option['value'],
                                'text' => $option['text'],
                            ];
                        }
                    }

                    //error = Cannot use object of type stdClass as array
//                $aux[] = (Object)[
                    $aux[] = [
                        'tab' => [
                            'name'=>$aux4['name'],
                            'label'=>$aux4['label'],
                        ],
                        'type' => $field->type,
                        'name' => $field->name,
                        'label' => $field->label,
                        'placeholder' => $field->placeholder,
                        'options' => $options,
                    ];
                }
            }
//            $aux4['fields'] = $aux;
            $tabs[] = $aux4;
        }
//        $tabs
        $fields = $aux;
//        return ['error','object'=>$object];
        echo '<pre>';
        var_dump($fields);
        echo '<pre>';
        return;
        return view($form,
            [
                'route'=>$route,
                'fields'=> $fields,
                'tabs'=> $tabs,
                'values' => $values,
                'activePage' => $params['activePage'],
                'activeButton' => $params['activeButton'],
            ]);
    }
}
