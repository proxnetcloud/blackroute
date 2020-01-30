<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use App\Phone;
use App\Address;
use App\Client;
use App\Subscription;
use App\_Model;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return 'ok';
        //teste de colocar abas no formulario
//        $this->_1580011732603();

        return _Model::find(2)->name;
    }

    //teste de colocar abas no formulario
    public function _1580011732603()
    {
        $ModelsFields = [
            [
                'Model'=> People::class,
                'fields' => [],
//                'fields' => false,
//                'fields' => ['field1','field2'],
            ],
            [
                'Model' => Phone::class,
                'fields' => [],
            ],
            [
                'Model' => Address::class,
                'fields' => [],
            ],
            [
                'Model'=> Client::class,
                'fields' => [],
//                'fields' => false,
//                'fields' => ['field1','field2'],
            ],
            [
                'Model'=> Subscription::class,
                'fields' => ['login','password'],
//                'fields' => false,
//                'fields' => ['field1','field2'],
            ],
        ];
//        return SystemController::__create($ModelsFields,'client.store');

//        $fields = [];
//
//        $options = [];
//        $option = [
//
//        ];
//        $options[] = $option;
//        $field = [
//            'type' => '',
//            'name' => '',
//            'label' => '',
//            'placeholder' => '',
//            'options' => $options,
//        ];
//        $fields[] = $field;

        $params = [
            'ModelsFieldsIDs' => $ModelsFields ,
            'route' => 'client.store' ,
            'form' => 'test' ,
//            'fields' => $fields,
//            'view' => 'form.form' ,
            'activePage' => 'register_client',
            'activeButton' => 'client',
        ];
        return SystemController::form($params);
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
