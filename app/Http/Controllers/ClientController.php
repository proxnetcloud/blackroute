<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\People;
use App\Address;
use App\Subscription;
use App\Phone;

class ClientController extends Controller
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
    // para permitir gerar alias
    public function _1579976504619()
    {
//        $ModelsFields = [ 'tabs' =>
        $tabs = [
            [
                'name' => 'data',
                'label' => 'Dados',
                'fields' =>
                [
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
                ],
            ],
            [
                'name' => 'address',
                'label' => 'Endereço',
                'fields' =>
                [
                    [
                        'Model' => Address::class,
                        'fields' => [],
                    ],
                ],
            ],
//            [
//                'name' => '',
//                'label' => '',
//                'fields' =>
//                [
//                    'Model'=> Client::class,
//                    'fields' => [],
//    //                'fields' => false,
//    //                'fields' => ['field1','field2'],
//                ],
//            ],
            [
                'name' => 'circuit1',
                'label' => 'Circuito Primário',
                'fields' =>
                [
                    [
                        'Model'=> Subscription::class,
                        'fields' => ['login','password'],
        //                'fields' => false,
        //                'fields' => ['field1','field2'],
                    ],
                ],
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
//            'ModelsFieldsIDs' => $ModelsFields ,
            'tabs' => $tabs ,
            'route' => 'client.store' ,
            'form' => 'form.form' ,
//            'fields' => $fields,
//            'view' => 'form.form' ,
            'activePage' => 'register_client',
            'activeButton' => 'client',
            ''=>'',
        ];
        return SystemController::form($params);
    }
    //chamada de metodo sem redirect
    public function _create()
    {
        return $this->_1579976504619();
    }
    public function create()
    {
        //
        $message = '';
//        $return = $this->_1579976504619();
        //return 'ok4';
        return $this->_1579976504619();
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579976504619.');
        }
        return redirect()->back()->with('message',$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // para permitir gerar alias
    public function _1580005977553(Request $request)
    {
        return SystemController::__store(Client::class,$request);
    }
    //chamada de metodo sem redirect
    public function _store(Request $request)
    {
        return $this->_1580005977553($request);
    }
//    public function store(Request $request)
//    {
//        //
//        $return = $this->_123($request);
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #123.');
//        }
//        return redirect()->back()->with('message',$request->_message);
//    }
    public function store(Request $request)
    {
        //
//        People::class;
//        Phone::class;
//        Client::class;
//        Subscription::class;

        $user = \Auth::user();
        $request->user_id = $user->id;
        $request->company_id = $user->company_id;

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $vars = [];

//        foreach ($Models as $Model)
//        {
//            $Controller = ucfirst(strtolower($Model)).'Controller';
//            $return = (new $Controller())->_store($request);;
////            $return = (new PeopleController())->_store($request);;
//            if ( $return[0] == 'error' )
//            {
//                return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//            }
//
////            $company = $return['object'];
////            $request->company_id = $company->id;
//            // Simular as duas linhas acima .
//            $vars[strtolower($Model)] = $return['object'];
//            $model = strtolower($Model);
//            $request->$model = $vars[strtolower($Model)]->id;
//        }

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
        $return = (new PeopleController())->_store($request);;
//            $return = (new $Controller())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }

        $people = $return['object'];
        $request->people_id = $people->id;
        // Simular as duas linhas acima .
//        $vars[strtolower($Model)] = $return['object'];
//        $model = strtolower($Model);
//        $request->$model = $vars[strtolower($Model)]->id;

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
        $return = (new PhoneController())->_store($request);;
//            $return = (new PeopleController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }

        //comentado pois sempre é um object para varios phones e não o contrario
//        $phone = $return['object'];
//        $request->phone_id = $phone->id;
        // Simular as duas linhas acima .
//        $vars[strtolower($Model)] = $return['object'];
//        $model = strtolower($Model);
//        $request->$model = $vars[strtolower($Model)]->id;

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
        $return = (new AddressController())->_store($request);;
//            $return = (new PeopleController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }

        //não comentado embora tenha-se mudado depois do user pronto para...
        //...varios address para um object
        $address = $return['object'];
        $request->address_id = $address->id;
        // Simular as duas linhas acima .
//        $vars[strtolower($Model)] = $return['object'];
//        $model = strtolower($Model);
//        $request->$model = $vars[strtolower($Model)]->id;

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
        $return = (new ClientController())->_store($request);;
//            $return = (new PeopleController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $client = $return['object'];
        $request->client_id = $client->id;
        // Simular as duas linhas acima .
//        $vars[strtolower($Model)] = $return['object'];
//        $model = strtolower($Model);
//        $request->$model = $vars[strtolower($Model)]->id;

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
        $return = (new SubscriptionController())->_store($request);;
//            $return = (new PeopleController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $subscription = $return['object'];
        $request->subscription_id = $subscription->id;
        // Simular as duas linhas acima .
//        $vars[strtolower($Model)] = $return['object'];
//        $model = strtolower($Model);
//        $request->$model = $vars[strtolower($Model)]->id;

//        $return = (new UserController())->_update($request,$user->id);;
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//        }
//        $user = $return['object'];
//
//        $return = (new AddressController())->_store($request);;
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//        }
//        $address = $return['object'];
        return redirect()->back()
            ->with("message",
                "Cliente ".$people->name." cadastrado com sucesso .");
//                "Cliente ".$vars['people']->name." cadastrado com sucesso .");
//        return redirect()->route('home')
//            ->with("message",
//                "Cliente ".$vars['people']->name." cadastrado com sucesso .");
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
