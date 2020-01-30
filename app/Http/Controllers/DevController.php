<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscription;

class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Model = 'App\Subscription';
//        $return = ($Model::class)::form();
        $return = $Model::form();
        var_dump($return);
        return 'ok';
        //ver os id do form de algum controlador com o aviso se fields vazio ou não
        //O aviso de fields vazio foi usado para debugar o tratamento inicial do request recebido pelo
        //... método store client
        $tabs = (new ClientController())->form();
        foreach ($tabs as $tab)
        {
            foreach ($tab['models'] as $model)
            {
                if ( empty($model['fields']) ) {
                    $msg = ' - fields vazio';
                }
                else
                {
                    $msg = '';
                }
                echo '<input type="checkbox">'.$model['action']['id'].$msg.'<br>';
            }
        }

        //ver os 'name' dos retornados pelo form() de algum model
        //..tratando-os para serem usados no array para indexa-los por nome
        //...precisa ir no método e acionar para retornar com o objetivo de deixar sem ordem
        //...ou retornar a variavel antes do tratamento final
//        $fields = Subscription::form()[0];
//        echo '<pre>';
//        var_dump($fields);
//        echo '<pre>';
//        return;
//        foreach ($fields as $name => $field)
//        {
//            echo $field['name'].'<br>';
//        }
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
