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
//        echo '<br>';
//        echo json_encode($request);
//        echo '<br>';
        if ( $id == '' )
        {
            return ['error','msg'=>'#1580498638552 Class '.$Class];
        }
        $object = $Class::where('id',$id)->first();
        $fields = $Class::fields();
        foreach ($fields as $field)
        {
            if ( isset($request->$field))
            {
//                if ( !empty($request->$field) ) {
                if ( $request->$field != '' ) {
//                    try {
                        $object->$field = $request->$field;
//                    }catch (\Exception $e)
//                    {
//                        echo json_encode($e->getMessage());
//                        echo '<br>';
//                        echo $request->$field;
//                        echo '<br>';
//                        echo $field;
//                        echo '<br>';
//                        echo $Class;
//                        echo '<br>';
//                        echo $id;
//                        $object->save();
//                        echo $object->id;
//                        echo '<br>';
//                        echo 'ok';
//                    }
                }
            }
            else
            {
//                echo $Class.':'.$field.'<br>';
            }
        }
        $object->save();
        return ['sucess','object'=>$object];
        //exemple 2 padronizado
//        return ['error','object'=>$object];
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
            return redirect()->back()->with('message','Ocorreu um erro #1580499411017.');
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
            return redirect()->back()->with('message','Ocorreu um erro #1580499435917 .');
        }
        $user = $return['object'];

        $return = (new AddressController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1580499450616 .');
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

    public static function params($params)
    {
        $prefix = 'App\\';
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
            $_tab = $aux4;
//            $aux = [];

//            $ModelsFields = $tab['models'];
//            $ModelsFields = $tab['fields'];
//            foreach ($ModelsFields as $ModelFields) {
//            foreach ($tab['fields'] as $Model) {
            $aux5 = [];
            $_models = $aux5;
            foreach ($tab['models'] as $Model) {
                $ModelFields = $Model;
                $ModelFieldsID = $ModelFields;

//                $aux5 = [];
//                $aux = [];
//                $_model = $aux;
                $_model = [];
                $_model['Model'] = $Model['Model'];
                if ( isset($Model['label'])) {
                    $_model['label'] = $Model['label'];
                }
                $_fields = [];
                if ( isset($ModelFields['action']['id']))
                {
                    $id = $ModelFields['action']['id'];
                    if ( empty($id) )
                    {
                        throw new \Exception(
                            '$ModelFields[\'action\'][\'id\']'.' não pode ser vazio pois o id é usado para salvar 
                            os dados .'
                            //$query, $this->prepareBindings($bindings), $e
                        );
                    }
                }
                else
                {
//                    $id = '';
                    throw new \Exception(
                        '$ModelFields[\'action\'][\'id\']'.' precisa existir e não pode ser vazio
                         pois o id é usado para salvar 
                            os dados .'.' Na tab '.$tab['label']
                    //$query, $this->prepareBindings($bindings), $e
                    );
                }
                if ( isset($ModelFields['action']) ) {
//                    $aux5['action'] = $ModelFields['action'];
//                    $_aux = $_model;
//                    $aux['action'] = $ModelFields['action'];
                    $_model['action'] = $ModelFields['action'];
                }
                else{
//                    $aux5['action'] = [];
//                    $_aux = $_model;
//                    $aux['action'] = [];
                    $_model['action'] = [];
                }
//                $error = new Error();
//                $error->value = json_encode($ModelFields);
//                $error->save();

//                $fields = (Object)$ModelFields['Model']::form()[0];
//                if ( $ModelFields['Model'] == 'Metro_UTP' or $ModelFields['Model'] == 'CTO_Port' )
//                {
                    $fields = ('App\\'.$ModelFields['Model'])::form()[0];
//                }
//                else {
//                    $fields = $ModelFields['Model']::form()[0];
//                }
                $aux2 = '';
                if (isset($ModelFieldsID['id'])) {
                    $aux2 = $ModelFields['Model']::where('id', $ModelFieldsID['id'])->first();
                }
//                if ( $ModelFields['fields'] != []) {
//                if ( !isset($fields[0])) {
                if ( !isset($fields[0]) and $ModelFields['fields'] != []) {
                    $fields3 = $ModelFields['fields'];
                }
                else
                {
//                    return 'ok';
                    $fields3 = $fields;
                }
//                foreach ($fields as $field) {
//                foreach ($ModelFields['fields'] as $field) {
                foreach ($fields3 as $field) {
//                    $field = (Object)$field;
//                $data[$field->name] = $aux2->$($field->name);
//                $data[$field->name] = $aux2->$$field->name;
//                    if ( $ModelFields['fields'] != []) {
//                    if ( !isset($fields[0]) ) {
                    if ( !isset($fields[0]) and $ModelFields['fields'] != []) {
//                        try{
                            $field = $fields[$field];
//                        }
//                        catch (\Exception $e)
//                        {
//                            echo '<pre>';
//                            var_dump($fields);
//                            echo '<pre>';
//                            return;
//                        }
                    }
//                    else
//                    {
//                        $field = $field;
//                    }

                    //PEGAR OS VALUE DO OBJECT ID
//                    try {
//                        $name2 = $fields[$field]['name'];
                        $name2 = $field['name'];
//                    }catch (\Exception $e){
//                        echo $id;
//                        echo '<br>';
//                        echo $field;
//                        echo '<br>';
//                        echo '<pre>';
//                        var_dump($fields[$field]);
//                        var_dump($fields);
//                        echo '<pre>';
//                        return;
//                    }
//                    $name2 = $field->name;
                    if (isset($aux2->$name2)) {
//                        $data[$field->name] = $aux2->$name2;
                        $data[$field['name']] = $aux2->$name2;
//                        $data[$fields[$field]['name']] = $aux2->$name2;
                    }

                    $aux2 = [];
                    foreach ($ModelFields['fields'] as $field2) {
//                        $aux2[] = [$field->name, $field2];
                        $aux2[] = [$field['name'], $field2];
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
//                    continue;
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
//                    if ($field->type == 'select' or $field->type == 'radio') {
//                    if ($fields[$field]['type'] == 'select' or $fields[$field]['type'] == 'radio') {
                    if ($field['type'] == 'select' or $field['type'] == 'radio') {
//                        foreach ($fields[$field]['options'] as $option) {
                        foreach ($field['options'] as $option) {
                            $options[] = [
                                'value' => $option['value'],
                                'text' => $option['text'],
                            ];
                        }
                    }

                    //error = Cannot use object of type stdClass as array
//                $aux[] = (Object)[
                    //chave tab redundante e não usada
//                    $aux = $_model;
//                    $aux[] = [
//                    $_model[] = [
                    $_fields[] = [
                        'tab' => [
                            'name'=>$_tab['name'],
//                            'name'=>$aux4['name'],
//                            'label'=>$aux4['label'],
                            'label'=>$_tab['label'],
                        ],
                        'type' => $field['type'],
//                        'type' => $fields[$field]['type'],
//                        'type' => $field->type,
//                        'name' => $field->name.'__'.$id,
                        'name' => $field['name'].'__'.$id,
//                        'name' => $fields[$field]['name'].'__'.$id,
//                        'label' => $field->label,
                        'label' => $field['label'],
//                        'label' => $fields[$field]['label'],
//                        'placeholder' => $field->placeholder,
                        'placeholder' => $field['placeholder'],
//                        'placeholder' => $fields[$field]['placeholder'],
//                        'options' => $options,
                        'options' => $options,
                    ];
                }
//                $aux5[] = $aux;
                $_model['fields'] = $_fields;
                $_models[] = $_model;
//                $_models = $aux5;
//                $aux = $_model;
            }
//            $aux4['fields'] = $aux;
            //tentar declarar $aux4['fields'] como um array e fazer a linha abaixo ser $aux4['fields'][] = $aux5
//            $aux4['fields'] = $aux5;
            $_tab['models'] = $_models;
//            $tabs[] = $aux4;
            $tabs[] = $_tab;
        }
//        $tabs
//        $fields = $aux;
//        return ['error','object'=>$object];
//        echo '<pre>';
//        var_dump($fields);
//        echo '<pre>';
//        return;
//        if ( !isset($actions))
        if ( !isset($params['actions']))
        {
//            $actions = [];
            $params['actions'] = [];
        }
//        echo '<pre>';
//        echo json_encode($tabs);
//        echo '<pre>';
//        return;
        $params = [
            'form' => $form,
            'params' =>
                [
                    'route'=>$route,
    //                'fields'=> $fields,
                    'tabs'=> $tabs,
                    'values' => $values,
                    'activePage' => $params['activePage'],
                    'activeButton' => $params['activeButton'],
    //                'actions' => $actions,
                    'actions' => $params['actions'],
                ],
        ];
        return $params;
    }

    public static function form($params)
    {
        $params = SystemController::params($params);
        return view($params['form'],$params['params']);
    }
}
