<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesterController extends Controller
{
    public static function client()
    {
        $retorno = TesterController::form('Client');
        if ( $retorno[0] == 'error' )
        {
            echo $retorno['msg'];
            return ['error'];
        }
//        return ['sucess'];
    }

    public static function form($controlller)
    {
        $prefix = 'App\Http\Controllers\\';
        $Controller = $prefix.$controlller.'Controller';
//        $prefix = 'App\\';
//        $Model = $prefix.$model;
        $params = $Controller::params();
        $params = SystemController::params($params);
        $params = $params['params'];
        $tabs = $params['tabs'];
//        $tabs = $Controller()::form();
        $request_ = new Request();
        foreach($tabs as $tab)
        {
            foreach($tab['models'] as $model)
            {
                $id = $model['action']['id'];
                if ( $id == '')
                {
                    echo "error : model['action']['id'] não pode ser vazio".'<br>';
                    return;
                }
                foreach($model['fields'] as $field)
                {
                    $name = $field['name'];
//                    echo '1';
//                    echo '<br>';
//                    echo $name;
//                    echo '<br>';
//                    echo $field['type'];
//                    echo '<br>';
                    if ( $field['type'] == 'select' or $field['type'] == 'radio')
                    {
                        //implementar para testar todas as opções
                        if ( isset($field['options'][0]['value']) )
                        {
                            $value = $field['options'][0]['value'];
                        }
                        else
                        {
                            $value = '';
                        }
                    }
                    else if ( $field['type'] == 'number' )
                    {
                        $value = '20.05';
                    }
                    else
                    {
                        $value = $name.'123';
                    }
                    $request_->$name = $value;
//                    if ( strpos($name,'mother'))
//                    if ( strpos($name,'address'))
                    if ( strpos($name,'onu'))
//                    if ( strpos($name,'ssid'))
                    {
                        echo 'ok';
                        echo '<br>';
                        echo $name;
                        echo '<br>';
                        echo $value;
                        echo '<br>';
                        echo $request_->$name;
                        echo '<br>';
                    }
//                    echo $name;
//                    echo '<br>';
                }
            }
        }
        $return = $Controller::__store($request_);
        if ( $return[0] == 'error' )
        {
            echo 'Erro #1580496353151 Controller '.$Controller.' em '.$return['msg'];
            return ['error'];
        }
        else
        {
            echo 'Verique o banco de dados se os dados foram cadastrados de acordo com os dados abaixo .'.'<br>'.'<br>';
            $objects = $return['objects'];
            $aux = ['Verifique o banco de dados'];
            $models = [];
            $ids = [];
            foreach ($objects as $object)
            {
//                if ( !is_array($object[0],))array_key_exists ( mixed $key , array $array )
//                  $models[] = $object[0];
                if ( !isset($models[$object[0]]))
                {
                    $models[$object[0]] = 1;
                }
                else
                {
                    $models[$object[0]]+=1;
                }

                if ( !isset($ids[$object[0]]))
                {
                    $ids[$object[0]] = [$object[1]];
                }
                else
                {
                    $ids[$object[0]][] = $object[1];
                }

                $aux[] = ['model'=>$object[0],'type'=>$object[1]];
                echo 'Model : '.$object[0].' | type : '.$object[1];
                echo '<br>';
            }
//            echo json_encode($aux);
            //tentando implementar consulta os ultimos indices do db
            foreach ($objects as $object) {
                $prefix = 'App\\';
//                $Model = $prefix . $model['Model'];
                $Model = $prefix . $object[0];
                $fields = $Model::fields();
//                    echo $model['Model'];
//                $values = $Model::all()->orderBy('desc')->limit($models[$model['Model']]);
//                echo $models[$object[0]];
//                echo '<br>';
//                $values = $Model::where('id','like','%%')->orderBy('desc')->limit($models[$object[0]]);
//                $values = $Model::where('id','like','%%')->orderBy('id','desc')->limit($models[$object[0]]);
//                $values = $Model::orderBy('desc')->limit($models[$object[0]])->first();
                $values = $Model::orderBy('id','desc')->get();
//                $values = $Model::get();
//                $values = $values->orderBy('desc')->take($models[$object[0]]);
//                $values = $values->sortBy('id','desc')->take($models[$object[0]]);
//                $values = $Model::orderBy('id','desc')->get();
//                $values = $Model::where('id','like','%%')->orderBy('desc');
//                $values = $Model::where('id','like','%%');
//                $values = $Model::all();
//                $values = $Model::all()->orderBy('id','desc');
//                $values = $Model::orderBy('desc')->limit($models[$model['Model']]);
//                $values = $Model::orderBy('desc')->limit($models[$object[0]]);
//                echo json_encode($values);
//                echo '<br>';
                $i = 0;
                foreach ($values as $value) {
                    if ( $i >= $models[$object[0]] )
                    {
                        break;
                    }
                    $i++;
//                    echo $model['Model'];
                    echo '<br>';
                    echo $object[0];
                    echo '<br>';
//                    echo json_encode($ids[$model['Model']]);
                    echo json_encode($ids[$object[0]]);
                    echo '<br>';
                    foreach ($fields as $field) {
                        echo $field.' ';
                        echo '<br>';
                        echo $value->$field;
//                        $aux = $field.'__'.$id;
//                        if ( $value->$field != $request_->$aux)
//                        {
//                            echo 'fail';
//                        }
                        echo '<br>';
                    }
                }
            }
            return ['sucess'];
        }
    }

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
}
