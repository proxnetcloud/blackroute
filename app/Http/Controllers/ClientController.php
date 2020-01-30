<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Document;
use App\People;
use App\Address;
use App\Subscription;
use App\Phone;
use App\FTTH;
use App\CTO;
use App\CTOPort;
use App\ONU;
use App\Plan;
use App\Wireless;
use App\MetroUTP;

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
        $tabs = $this->form();
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

        //o id é o id de um model com seus fields a serem exibidos e usado para criar uma div com eles
        //display é o modo padrão de início
        //select é o select que executará a ação e option é a opção que mostrará o conteudo do id
        $actions = [
            [//se é apenas para mostrar e ocultar um único conjunto de classe , deixar preenchido com somente um action
                [
//                    'id' => 'representative',//id do model desse campo
                    'id' => 'representative',//class que é para ser mostrada quando selecionada a opção referida
                                                //...as outras class dessa action são ocultadas
                    'select' => 'person',
                    'option' => 'juridica',
                ],
                [
                    'id' => 'rg',//id do model desse campo
                    'select' => 'person',
                    'option' => 'fisica',
                ],
            ],
            [//se é apenas para mostrar e ocultar um único conjunto de classe , deixar preenchido com somente um action
                [
                    'id' => 'ftth',//class que é para ser mostrada quando selecionada a opção referida
                                    //...as outras class dessa action são ocultadas
                    'select' => 'technology',
                    'option' => 'ftth',
                ],
                [
                    'id' => 'w24',//class que é para ser mostrada quando selecionada a opção referida
                                    //...as outras class dessa action são ocultadas
                    'select' => 'technology',
                    'option' => 'w24',
                ],
                [
                    'id' => 'w58',//class que é para ser mostrada quando selecionada a opção referida
                                    //...as outras class dessa action são ocultadas
                    'select' => 'technology',
                    'option' => 'w58',
                ],
                [
                    'id' => 'metro_utp',//class que é para ser mostrada quando selecionada a opção referida
                                    //...as outras class dessa action são ocultadas
                    'select' => 'technology',
                    'option' => 'metro_utp',
                ],
            ],
        ];

        $params = [
//            'ModelsFieldsIDs' => $ModelsFields ,
            'tabs' => $tabs ,
            'route' => 'client.store' ,
            'form' => 'form.form' ,
//            'fields' => $fields,
//            'view' => 'form.form' ,
            'activePage' => 'register_client',
            'activeButton' => 'client',
            'actions'=>$actions,
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
        //$ids = ['user','company'];
        $request->user_id = $user->id;
        $request->company_id = $user->company_id;
        $company = $user->company;

        $form = $this->form();
        $ask = [];
        //$ask[$id] = new Request();
        foreach ($form as $tab)
        {
            foreach ($tab['fields'] as $model)
            {
//                $fields = $model['Model']::form()[0];
                if ( isset($model['action']['id']) )
                {
                    $id = $model['action']['id'];
                }
                else
                {
                    $id = '';
                }
                $ask[$id] = new Request();
                foreach ($model['fields'] as $field)
                {
                    //tratar se $field estiver vazia...pegar o Model::form() e o name e ir
                    $aux = $field.'__'.$id;
                    $ask[$id]->$field = $request->$aux;
                }
//                foreach ($fields as $field)
//                {
//                    $ask[$model->id]->
//                }
            }
        }
        $id = 'user';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }
        $id = 'company';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

        $id = 'plan';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $ask[$id]->$aux;
        }

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
//        $return = (new AddressController())->_store($request);;
        $return = (new AddressController())->_store($ask['address']);;
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
        $id = 'address';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
//        $return = (new PeopleController())->_store($request);;
        $return = (new PeopleController())->_store($ask['people']);;
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
        $id = 'people';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
//        $return = (new PhoneController())->_store($request);;
        $return = (new PhoneController())->_store($ask['phone']);;
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
        $id = 'phone';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
//        $return = (new ClientController())->_store($request);;
        $return = (new ClientController())->_store($ask['client']);;
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
        $id = 'client';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $Controller = ucfirst(strtolower($Model)).'Controller';
        $return = (new SubscriptionController())->_store($ask['subscription']);;
//        $return = (new SubscriptionController())->_store($request);
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
        $id = 'subscription';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

        $id = 'representative';
        $return = (new PeopleController())->_store($ask[$id]);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $$id = $return['object'];
//        $request->subscription_id = $subscription->id;
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $$id->id;
        }

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

    public function form()
    {
        $tabs = [
            [
                'name' => 'data',
                'label' => 'Dados Pessoais',
                'models' =>
                    [
                        [
                            'Model' => People::class,
                            'fields' => ['name'],
                            'action' => [
                                'id' => 'people1',
//                                'display' => 'show',
//                                'select' => 'person',
//                                'option' => 'fisica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => People::class,
                            'fields' => ['cpf'],
                            'label' => ' / CNPJ',//label a adicionar ao label de cada campo
                            'action' => [
                                'id' => 'people2',
//                                'display' => 'show',
//                                'select' => 'person',
//                                'option' => 'fisica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => People::class,
                            'fields' => ['person'],
                            'action' => [
                                'id' => 'people3',
//                                'display' => 'show',
//                                'select' => 'person',
//                                'option' => 'fisica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => People::class,
                            'fields' => ['juridica_type'],
                            'label' => '',
                            'action' => [
                                'id' => 'people4',
                                'class' => 'representative',
                                'display' => 'none',
    //                                'select' => 'person',
    //                                'option' => 'juridica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => People::class,
                            'fields' => ['name','cpf'],
                            'label' => ' - Representante Legal',
                            'action' => [
                                'id' => 'representative',
                                'class' => 'representative',
                                'display' => 'none',
//                                'select' => 'person',
//                                'option' => 'juridica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => People::class,
                            'fields' => ['rg'],
                            'action' => [
                                'id' => 'people6',
                                'class' => 'rg',
//                                'display' => 'none',
//                                'select' => 'person',
//                                'option' => 'juridica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => People::class,
                            'fields' => ['birth','email','civil_state'],
                            'action' => [
                                'id' => 'people7',
//                                'display' => 'none',
//                                'select' => 'person',
//                                'option' => 'juridica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
                            'Model' => Phone::class,
                            'fields' => [],
                            'label' => ' 1',
                            'action' => [
                                'id' => 'phone1',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                        [
                            'Model' => Phone::class,
                            'fields' => [],
                            'label' => ' 2',
                            'action' => [
                                'id' => 'phone2',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                    ],
            ],
            [
                'name' => 'address',
                'label' => 'Endereço',
                'models' =>
                    [
                        [
                            'Model' => Address::class,
                            'fields' => [],
                            'action' => [
                                'id' => 'address',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
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
                'models' =>
                    [//'plan_id','auth_type','status','ip_address','mac_address','login', 'password',
                        [
                            'Model'=> Plan::class,
                            'fields' => ['plan_id'],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'plan',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                        [
                            'Model'=> Subscription::class,
                            'fields' => ['auth_type','status','ip_address','mac_address','login', 'password',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'subscription1',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                    ],
            ],
            [
                'name' => 'circuit2',
                'label' => 'Circuito Secundário',
                'models' =>
                    [
                        [
                            'Model'=> Subscription::class,
                            'fields' => ['technology',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'subscription2',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> FTTH::class,
                            'fields' => ['olt','pon_port',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'ftth1',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [//quando é para exibir uma lista de objetos de uma tabela , aqui por exemplo da tabela cto
                            'Model'=> CTO::class,
                            'fields' => ['cto_id',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'cto',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> CTOPort::class,
                            'fields' => ['cto_port_id',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'cto_port',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> ONU::class,
                            'fields' => ['model','serial','mac','ip',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'onu',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> FTTH::class,
                            'fields' => ['vlan',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'ftth2',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> Wireless::class,
                            'fields' => ['ssid','password','radio','ip','vlan',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'w24',
                                'class' => 'w24',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> Wireless::class,
                            'fields' => ['ssid','password','radio','ip','vlan',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'w58',
                                'class' => 'w58',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> MetroUTP::class,
                            'fields' => ['caixa_switch','fonte_poe','switch_port','vlan',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'metro_utp',
                                'class' => 'metro_utp',
                                'display' => '',
                            ],
                        ],
                    ],
            ],
            [
                'name' => 'financial',
                'label' => 'Dados de Pagamento',
                'models' =>
                    [
                        [
                            'Model'=> Document::class,
                            'fields' => ['document_id',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'contrato',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> Subscription::class,
                            'fields' => ['items_comodato','financial_api','free','discount_pay',
                                'extra_pay','pay_day','auto_block','days_to_block','comment',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'subscription3',
                                'display' => '',
                            ],
                        ],
                    ],
            ],
        ];

        return $tabs;
    }
}
