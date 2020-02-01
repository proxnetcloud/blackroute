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
use App\CTO_Port;
//use App\CTOPort;
use App\ONU;
use App\Plan;
use App\Wireless;
use App\Metro_UTP;
use MongoDB\Driver\Query;

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
        $relation = 'clients';
//        $columns = ['name','cpf','email'];
        $columns = ['Nome','Status','Plano','IP','Auth','Login','Endereço','Ações'];
        //objectos internos são seguidos por $ e string sem $
        $lines_ = [
            [
//                '$client','$people','$name',
                '$people','$name',
                '<br>','CPF / CNPJ : ',
//                '$client','$people','$cpf',
                '$people','$cpf',
                '<br>','EMAIL : ',
//                '$client','$people','$email',
                '$people','$email',
            ],
            [
                '',
            ],
            [
                '$subscription','$plan','$name',
            ],
            [
                '$subscription','$ip_address',
            ]
        ];

        $buttons = [];
        //model
//        $button = [
//            'type' => '',//link or form
//            'route' => [
//                'route' => '',
//                'params' => '',
//            ],
//            'finality' => '',//edit or delete
//        ];
//        $buttons[] = $button;
//        $button = [
//            'type' => '',//link or form
//            'route' => [
//                'route' => '',
//                'params' => '',
//            ],
//            'finality' => '',//edit or delete
//        ];
//        $buttons[] = $button;
////        $lines = \DB::table($table)->select('name', 'email as user_email')->get();
////        $lines = \DB::table($table)->get();
////        $lines = Client::all();
////        $lines = \Auth::user()->company->clients;
//        $lines = [];
        $clients = \Auth::user()->company->clients;
        $company = \Auth::user()->company;
//        echo json_encode($company);
//        echo json_encode($clients);
//        echo '<br>';
        foreach ($clients as $client) {
            $aux = [];

            $button = [
                'type' => 'link',//link or form
                'route' => [
                    'route' => 'client.edit',
                    'params' => [$client->id],
                ],
                'finality' => 'edit',//edit or delete
            ];
            $aux[] = $button;

            $button = [
                'type' => 'form',//link or form
                'route' => [
                    'route' => 'client.destroy',
                    'params' => [$client->id],
                ],
                'finality' => 'delete',//edit or delete
            ];
            $aux[] = $button;

            $buttons[] = $aux;
//            $line = [];
//            $line[0] = $client->people->name.
//                '<br>'.'CPF / CNPJ : '.$client->people->cpf.
//                '<br>'.'EMAIL : '.$client->people->email;
//            $line[1] = '';
//            $line[2] = $client->subscription->plan->name;
//            $line[3] =
//            $client->subscription;
        }

        $params = [
//            'objects' => 'clients',
            'objects' => $relation,
            'lines' => $lines_,
            'columns' => $columns,
        ];
        $retorno = ClientController::_index($params);
        if ( $retorno[0] == 'erro' ) {
            return;
        }
        $lines = $retorno['lines'];
        $links = $retorno['links'];

//        echo json_encode($buttons);
//        echo '<br>';

//        echo '<br>';
//        echo json_encode($lines);
//        echo '<br>';
//        return;
        $vars =
            [
                'links' => $links,
                'columns' => $columns,
                'lines' => $lines,
                'buttons' => $buttons,
//                    'route'=>$route,
                    //                'fields'=> $fields,
//                    'tabs'=> $tabs,
//                    'values' => $values,
//            'activePage' => $params['activePage'],
//            'activeButton' => $params['activeButton'],
                'activePage' => 'list_client',
                'activeButton' => 'client',
                    //                'actions' => $actions,
//                'actions' => $params['actions'],
            ];
        return view('list',$vars);
    }
    public static function _index($params)
    {
//        $columns = [];
        $columns = $params['columns'];
//        $lines = [];
        $lines = $params['lines'];
        $objects = $params['objects'];
//        $clients = \Auth::user()->company->clients;
//        echo $objects;
//        echo '<br>';
//        $$objects = \Auth::user()->company->$objects->paginate(3);
//        $$objects = \Auth::user()->company->$objects;
        $$objects = Client::where('company_id',\Auth::user()->company->id)->paginate(3);
//        echo json_encode($$objects);
//        echo '<br>';
//        $clients = \Auth::user()->company->clients;
//        echo json_encode($clients);
//        echo '<br>';
        $lines_ = [];
        foreach ($$objects as $object) {
            $i = -1;
            $columns__ = $lines;
            $columns_ = [];
            foreach ($lines as $line)
            {
                $i++;
                $line_ = [];
//                $line_[$i] = '';
//                echo json_encode($columns[$i]);
//                echo '<br>';
//                echo json_encode($i);
//                echo '<br>';
                $line_[$columns[$i]] = '';
                $aux = $object;
                $j = 0;
                //verifica se a $string anterior foi uma string
                //verifica se é para não add a var recuperada do DB
                $flag = 1;
                foreach ($line as $string)
                {
                    $j++;
                    if ( strpos($string,'$') === 0) {
                        echo '111';
                        echo '<br>';
                        echo json_encode($aux);
                        echo '<br>';
                        echo $string;
                        echo '<br>';
                        $string = substr($string, 1);
                        try {
                            $aux = $aux->$string;
                            $flag = 0;
                        }catch (\Exception $e)
                        {
                            $aux = $object;
                            $flag = 1;
                        }
//                        echo json_encode($aux);
//                        echo '<br>';
                        if ( count($line) == $j) {
                            $line_[$columns[$i]] .= $aux;
                            echo 'end';
                            echo '<br>';
                            echo $aux;
                            echo '<br>';
                            echo $string;
                            echo '<br>';
                            $flag = 0;
                        }
//                        $flag = 0;
                    }
                    else
                    {
//                        if ( count($line) != $j ) {
//                        echo $string;
//                        echo '<br>';
                        if ( $flag == 0) {
                            $line_[$columns[$i]] .= $aux . $string;
//                            echo '2';
//                            echo '<br>';
//                            echo $aux;
//                            echo '<br>';
                            $aux = $object;
                        }
                        else
                        {
                            $line_[$columns[$i]] .= $string;
                        }
                        $flag = 1;
//                        }
                    }
//                    if ( count($line) == $j)
//                    {
//                        $line_[$columns[$i]] .= $aux.$string;
//                        $aux = $object;
//                    }
                }
//                echo json_encode($line_);
//                echo '<br>';
//                echo '1';
//                echo '<br>';
//                $lines_[]=$line_;
//                $columns_[] = $line_;
                $columns_[] = $line_[$columns[$i]];
//                echo json_encode($lines_);
//                echo '<br>';
            }
            $lines_[]=$columns_;
//            $line = [];
//            $line[0] = $object->people->name.
//                '<br>'.'CPF / CNPJ : '.$client->people->cpf.
//                '<br>'.'EMAIL : '.$client->people->email;
//            $line[1] = '';
//            $line[2] = $client->subscription->plan->name;
//            $line[3] =
//                $client->subscription;
        }
//        echo json_encode($lines_);
//        echo '<br>';
        return ['','lines'=>$lines_,'links'=>$$objects];
        return ['erro'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //criado para ser usado em TesterController para não precisar refazer o trabalho de consultar os model
    public static function params()
    {
//        $ModelsFields = [ 'tabs' =>
//        $tabs = $this->form();
        $tabs = ClientController::form();
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
        return $params;
    }
    // para permitir gerar alias
    public function _1579976504619()
    {
//        $params = $this->params();
        $params = ClientController::params();
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
    //recebe o pedido da rota
    public function store(Request $request)
    {
        //
        $return = ClientController::__store($request);
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1580495818551 em '.$return['msg']);
        }
        return redirect()->back()->with('message','Cliente '.$return['client'].' cadastrado com sucesso .');
    }
    //processa o request recebido do formulário pela rota e passada para esse method que tbm guarda no DB
    public static function __store(Request $request)
    {
        $controlller = 'Client';
        $prefix = 'App\Http\Controllers\\';
        $Controller = $prefix.$controlller.'Controller';
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

        //classes model dos objects a criar
        $classes = [];
        $not_create = [];
        //ids das classes model adicionadas a $classes
//        $ids = []
//        $form = $this->form();
        $form = $Controller::form();
        $ask = [];
        $ask['client'] = new Request();
        echo '<br>';
        echo '<br>';
        echo json_encode($request);
        echo '<br>';
        echo '<br>';
        //$ask[$id] = new Request();
        foreach ($form as $tab)
        {
//            foreach ($tab['fields'] as $model)
            foreach ($tab['models'] as $model)
            {
//                $fields = $model['Model']::form()[0];
                if ( isset($model['action']['id']) )
                {
                    $id = $model['action']['id'];
                }
                else
                {
//                    $id = '';
                    throw new \Exception(
                        '$model[\'action\'][\'id\']'.' precisa existir e não pode ser vazio
                         pois o id é usado para salvar 
                            os dados .'.' Na tab '.$tab['label']
                    //$query, $this->prepareBindings($bindings), $e
                    );
                }
//                if ( strpos($model['Model']['action']['id'],strtolower($model['Model']) ) !== false )
                //verificar se o id é semelhante ao nome do model ou é diferente para definir
                //...se precisa ou não criar novo objeto para aquela classe
//                if ( strpos($id,strtolower($model['Model']) ) !== false )
//                {
//                    if ( array_search($model['Model'], $classes) === false) {
////                        $classes[] = $model['Model'];
////                        $ids[] = $model['Model']['action']['id'];
//                        if ( (isset($model['create']) and $model['create']) or !isset($model['create']))
//                        {
//                            $classes[] = $model['Model'];
////                            $classes[] = [
////                            $classes[$model['Model']] = [
//                            $classes1[$model['Model']] = [
////                                'class' => $model['Model'],
//                                //                            'id'=>$model['Model']['action']['id'],
////                                'id' => $id,
//                                $id,
//                            ];
//                        }
//                        else
//                        {
//                            $not_create[] = $id;
//                        }
//                    }
//                    else
//                    {
//                        $classes1[$model['Model']][] = $id;
//                    }
//                }
//                else
//                {
//                    $aux = [];
////                    foreach ($ids as $id)
//                    foreach ($classes as $class => $ids)
//                    {
//                        $aux[] = [
////                            $class['id'],
//                            $ids[0],
////                            $model['Model']['action']['id'],
//                            $id,
//                        ];
//                    }
//                    $arr = array_map(function ($params){
//                            if( strpos($params[1],strtolower($params[0])) ===false )
//                            {
//                                return 0;
//                            }
//                            else
//                            {
//                                return 1;
//                            }
//                        }, $aux);
//                    if ( (isset($model['create']) and $model['create']) or !isset($model['create'])) {
//                        if (!is_array('1', $arr)) {
//                            //                        $classes[] = $model['Model'];
//                            //                        $ids[] = $model['Model']['action']['id'];
//                            $classes
////                            $classes[] = [
////                                'class' => $model['Model'],
//                            $classes2[$model['Model']] = [
//                                //                            'id' => $model['Model']['action']['id'],
////                                'id' => $id,
//                                $id,
//                            ];
//                        }
//                        else
//                        {
//                            $classes2[$model['Model']][] = $id;
//                        }
//                    }
//                    else
//                    {
//                        $not_create[] = $id;
//                    }
//                }
                $ask[$id] = new Request();
                foreach ($model['fields'] as $field)
                {
                    //tratar se $field estiver vazia...pegar o Model::form() e o name e ir
                    $aux = $field.'__'.$id;
//                    echo $aux;
//                    echo '<br>';
                    $ask[$id]->$field = $request->$aux;
//                    echo $request->$aux;
//                    echo '<br>';
//                    echo $ask[$id]->$field;
//                    echo '<br>';
                }
                if (!count($model['fields']))
                {
                    $Model = 'App\\'.$model['Model'];
                    $fields = $Model::form()[0];
                    foreach ($fields as $field)
                    {
                        $field = $field['name'];
                        $aux = $field.'__'.$id;
                        $ask[$id]->$field = $request->$aux;
                    }
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
        $prefix = 'App\Http\Controllers\\';
        //[model,id]
        $classes = [
            ['Client','client'],
            ['People','people'],
            ['People','mother'],
            ['People','representative'],
            ['Phone','phone1'],
            ['Phone','phone2'],
            ['Phone','whatsapp'],
            ['Address','address'],
            ['Subscription','subscription'],
            ['FTTH','ftth'],
            ['CTO_Port','cto_port'],
            ['ONU','onu'],
            ['Wireless','w24'],
            ['Wireless','w58'],
            ['Metro_UTP','metro_utp'],
            ['DocumentSubscription','document_subscription']
            ];
        foreach ($classes as $class)
        {
//            $Model = $class['class'];
            $Model = $class[0];
//            $Model = $class;
//            $Controller = $prefix.ucfirst(strtolower($Model)).'Controller';
            $Controller = $prefix.$Model.'Controller';
//            $return = (new $Controller())->_store($request);;
            $return = (new $Controller())->_store(new Request());
////            $return = (new PeopleController())->_store($request);;
            if ( $return[0] == 'error' )
            {
//                return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//                return $return;
//                return ['error','msg'=>'#1579739493157 Model '.$Model.' return[0] '.$return[0]];
                return ['error','msg'=>'#1579739493157 Model '.$Model];
            }
            $object = $class[1];
//            $company = $return['object'];
            $$object = $return['object'];
//            $request->company_id = $company->id;

//            $id = 'company';
            $id = $object;
            foreach ($ask as $as)
            {
                $aux = $id.'_id';
                $as->$aux = $$id->id;
            }

//            $id = 'plan';
//            foreach ($ask as $as)
//            {
//                $aux = $id.'_id';
//                $as->$aux = $ask[$id]->$aux;
//            }
        }
        echo json_encode($ask['address']);
        echo '<br>';

        //ids dos blocos de campos ( models ) que não criam objetos e somente fornecem a informação do id
        $id = 'plan';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $ask[$id]->$aux;
        }
        $id = 'cto';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $ask[$id]->$aux;
        }
        $id = 'document';
        foreach ($ask as $as)
        {
            $aux = $id.'_id';
            $as->$aux = $ask[$id]->$aux;
        }

//        $Models = ['People','Phone','Address','Client','Subscription'];
//        $vars = [];

//        foreach ($classes as $class)
//        {
//            $Model = $class['class'];
//            $Model = $class[0];
//        foreach ($Models as $Model)
//        {
//            $Controller = $prefix.ucfirst(strtolower($Model)).'Controller';
//            $return = (new $Controller())->_store($request);;
//            $return = (new $Controller())->_store(new Request);;
//            $return = (new $Controller())->_update($ask[],$user->id);;
//            $return = (new PeopleController())->_store($request);;
//            if ( $return[0] == 'error' )
//            {
//                return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//            }
//            $company = $return['object'];
//            $request->company_id = $company->id;
//            // Simular as duas linhas acima .
//            $vars[strtolower($Model)] = $return['object'];
//            $model = strtolower($Model);
//            $request->$model = $vars[strtolower($Model)]->id;
//            $id = 'address';
//            foreach ($ask as $as)
//            {
//                $aux = $id.'_id';
//                $as->$aux = $$id->id;
//            }
//        }

        $arr = [];

        $Model = 'Client';
        $id = 'client';//model['action']['id']
        $object_id = 'client';//$classes[1]
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'people';//model['action']['id']
        $object_id = 'people';//$classes[1]
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'mother';//model['action']['id']
        $object_id = 'mother';//$classes[1]
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'people2';
        $object_id = 'people';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'people3';
        $object_id = 'people';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'people4';
        $object_id = 'people';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'representative';
        $object_id = 'representative';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'people6';
        $object_id = 'people';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'People';
        $id = 'people7';
        $object_id = 'people';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Phone';
        $id = 'phone1';
        $object_id = 'phone1';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Phone';
        $id = 'phone2';
        $object_id = 'phone2';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Phone';
        $id = 'whatsapp';
        $object_id = 'whatsapp';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];
        $ask[$id]->type = 'whatsapp';

        $Model = 'Address';
        $id = 'address';
        $object_id = 'address';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Subscription';
        $id = 'subscription';
        $object_id = 'subscription';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Subscription';
        $id = 'subscription2';
        $object_id = 'subscription';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'FTTH';
        $id = 'ftth';
        $object_id = 'ftth';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'CTO_Port';
        $id = 'cto_port2';
        $object_id = 'cto_port';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'ONU';
        $id = 'onu';
        $object_id = 'onu';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'FTTH';
        $id = 'ftth2';
        $object_id = 'ftth';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Wireless';
        $id = 'w24';
        $object_id = 'w24';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Wireless';
        $id = 'w58';
        $object_id = 'w58';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Metro_UTP';
        $id = 'metro_utp';
        $object_id = 'metro_utp';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Wireless';
        $id = 'w24';
        $object_id = 'w24';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Wireless';
        $id = 'w58';
        $object_id = 'w58';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Metro_UTP';
        $id = 'metro_utp';
        $object_id = 'metro_utp';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'DocumentSubscription';
        $id = 'document';
        $object_id = 'document_subscription';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        $Model = 'Subscription';
        $id = 'subscription3';
        $object_id = 'subscription';
        $arr[] = [
            'model'=>$Model,
            'id' => $id,
            'object_id' => $object_id,
        ];

        foreach ($arr as $ar) {

            $Model = $ar['model'];
            $id = $ar['id'];
            $object_id = $ar['object_id'].'_id';

//            $Controller = $prefix . ucfirst(strtolower($Model)) . 'Controller';
            $Controller = $prefix . $Model . 'Controller';
//            echo $object_id;
//            echo '<br>';
//            echo $ask[$id]->$object_id;
//            echo '<br>';
            $return = (new $Controller())->_update($ask[$id], $ask[$id]->$object_id);///
            if ($return[0] == 'error') {
                if ( isset($return['msg']) ) {
                    $em = $return['msg'];
                }
                return ['error','msg'=>'#1580499345818 Model '.$Model.' em '.$em];
//                return redirect()->back()->with('message', 'Ocorreu um erro #1579739493157 .');
            }
        }

        return ['sucess','client'=>$people->name,'objects'=>$classes];
        //return ['error','client'=>$people->name];
//        if ( $return[0] == 'error' )

//        return redirect()->back()
//            ->with("message",
//                "Cliente ".$people->name." cadastrado com sucesso .");
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
    // para permitir gerar alias
    public function _1580503545817(Request $request,$id)
    {
        return SystemController::__update(Client::class,$id,$request);
    }
    public function _update(Request $request,$id)
    {
        return $this->_1580503545817($request,$id);
    }
    public function update(Request $request,$id)
    {
        //
//        $return = $this->_123($request,$id);
//        if ( $return[0] == 'error' )
        $retorno = $this->_1580503545817($request,$id);
        if ( $retorno[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1580503545817 .');
        }
        return redirect()->back()->with('message',$request->_message);
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

    public static function form()
    {
        //o primeiro id de um objeto a ser criado precisa ser sem o número 1
        //people,people2,people3,...ao inves de people1,people2,people3
        //quando tiver duas div model conjunto de dados para ser add ao mesmo objecto , o id deve ser...
        //acrescido e não decrementado de caracteres de forma ao id do primeiro estar contido no id do segundo
        //isso para facilitar o tratamento inicial no method store
        //os id deve ser o nome do model em minusculo acrescido do numero quando necessario
        $tabs = [
            [
                'name' => 'data',
                'label' => 'Dados Pessoais',
                'models' =>
                    [
                        [
//                            'Model' => People::class,
                            'Model' => 'People',
                            'fields' => ['name'],
                            'action' => [
                                'id' => 'people',
//                                'display' => 'show',
//                                'select' => 'person',
//                                'option' => 'fisica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
//                            'Model' => People::class,
                            'Model' => 'People',
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
//                            'Model' => People::class,
                            'Model' => 'People',
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
//                            'Model' => People::class,
                            'Model' => 'People',
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
//                            'Model' => People::class,
                            'Model' => 'People',
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
//                            'Model' => People::class,
                            'Model' => 'People',
                            'fields' => ['name'],
                            'label' => ' da mãe',
                            'action' => [
                                'id' => 'mother',
                                'class' => 'rg',
//                                'display' => 'none',
//                                'select' => 'person',
//                                'option' => 'juridica',
                            ],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                        ],
                        [
//                            'Model' => People::class,
                            'Model' => 'People',
                            'fields' => ['rg','birth'],
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
//                            'Model' => People::class,
                            'Model' => 'People',
                            'fields' => ['email','civil_state'],
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
//                            'Model' => Phone::class,
                            'Model' => 'Phone',
                            'fields' => ['number'],
                            'label' => ' 1',
                            'action' => [
                                'id' => 'phone1',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                        [
//                            'Model' => Phone::class,
                            'Model' => 'Phone',
                            'fields' => ['number'],
                            'label' => ' 2',
                            'action' => [
                                'id' => 'phone2',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                        [
//                            'Model' => Phone::class,
                            'Model' => 'Phone',
                            'fields' => ['number'],
                            'label' => ' WhatsApp',
                            'action' => [
                                'id' => 'whatsapp',
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
//                            'Model' => Address::class,
                            'Model' => 'Address',
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
//                            'Model'=> Plan::class,
                            'Model'=> 'Plan',
                            'fields' => ['plan_id'],
                            'create' => false,
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
//                                'id' => 'subscription1580419318677',
                                'id' => 'plan',
//                                'display' => '',
//                                'select' => '',
//                                'option' => '',
                            ],
                        ],
                        [
//                            'Model'=> Subscription::class,
                            'Model'=> 'Subscription',
                            'fields' => ['auth_type','status','ip_address','mac_address','login', 'password',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'subscription',
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
//                            'Model'=> Subscription::class,
                            'Model'=> 'Subscription',
                            'fields' => ['technology',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'subscription2',
                                'display' => '',
                            ],
                        ],
                        [
                            'Model'=> 'FTTH',
//                            'Model'=> FTTH::class,
                            'fields' => ['olt','pon_port',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'ftth',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [//quando é para exibir uma lista de objetos de uma tabela , aqui por exemplo da tabela cto
//                            'Model'=> CTO::class,
                            'Model'=> 'CTO',
                            'fields' => ['cto_id',],
                            'create' => false,
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'cto',
//                                'id' => 'cto_port',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [
//                            'Model'=> CTO_Port::class,
                            'Model'=> 'CTO_Port',
                            'fields' => ['cto_port_id',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'cto_port2',
                                'class' => 'ftth',
                                'display' => '',
                            ],
                        ],
                        [
//                            'Model'=> ONU::class,
                            'Model'=> 'ONU',
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
//                            'Model'=> FTTH::class,
                            'Model'=> 'FTTH',
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
//                            'Model'=> Wireless::class,
                            'Model'=> 'Wireless',
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
                            'Model'=> 'Wireless',
//                            'Model'=> Wireless::class,
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
//                            'Model'=> Metro_UTP::class,
                            'Model'=> 'Metro_UTP',
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
//                            'Model'=> Document::class,
                            'Model'=> 'Document',
                            'fields' => ['document_id',],
                            //                'fields' => false,
                            //                'fields' => ['field1','field2'],
                            'action' => [
                                'id' => 'document',
                                'display' => '',
                            ],
                        ],
                        [
//                            'Model'=> Subscription::class,
                            'Model'=> 'Subscription',
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
