<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = [

        'plan_id','auth_type','status','ip_address','mac_address','login', 'password',
        'technology',
        'olt',
        'client_id',
        'items_comodato',
        'financial_api',
//        'pay',
        'free',
        'discount_pay', 'extra_pay','pay_day',
        'auto_block',
        'days_to_block',
        'comment',
        'company_id',

        //excluir do db
//        'ap_ins','has_comododato',


        //'has_comodato',

        // excluir esses campos da tabela
//        'pon_port', 'cto_number', 'cto_splitter', 'onu_olt_model',
//        'onu_serial', 'onu_mac', 'onu_ip', 'vlan_id',
//        'w58_ssid', 'w58_password', 'w58_ap_client', 'w58_radio_ip',
//        'w58_vlan_id', 'w24_ssid', 'w24_password',
//        'w24_ap_client', 'w24_radio_ip', 'w24_vlan_id', 'caixa_switch',
//        'ppoe_fonte', 'switch_port', 'metro_utp_vlan_id',

        'netflix',
        'router',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'client_id','mk_id', 'company_id','agreement_id',
        'employee_id', 'plan_id','address_id'
    ];

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function metro_utp()
    {
        return $this->hasOne('App\Metro_UTP');
    }

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function wireless()
    {
        return $this->hasOne('App\Wireless');
    }

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function ftth()
    {
        return $this->hasOne('App\FTTH');
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function document()
    {
        return $this->hasOne('App\Document');
    }

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580006583354()
    {
        return (new Subscription())->fillable;
    }
    public static function fields()
    {
        return Subscription::_1580006583354();
    }

    public static function form()
    {
        //$options =
        $fields = [];

        //'auth_type','status','ip_address','mac_address','login', 'password',

        //'login', 'password',
        $field = 'login';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Login',
            'placeholder' => 'admin',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'login', 'password',
        $field = 'password';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Senha',
            'placeholder' => 'Senha',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'auth_type','status','ip_address','mac_address'
        $field = 'auth_type';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Autenticação',
            'placeholder' => 'Autenticação',
            'options' => [
                [
                    'value' => 'pppoe',
                    'text' => 'PPPoE',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'auth_type','status','ip_address','mac_address'
        $field = 'status';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Status',
            'placeholder' => 'Status',
            'options' => [
                [
                    'value' => '0',
                    'text' => 'Bloqueado ( Cortar Acesso )',
                ],
                [
                    'value' => '1',
                    'text' => 'Ativo ( Com acesso à internet )',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'auth_type','status','ip_address','mac_address'
        $field = 'ip_address';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'IP',
            'placeholder' => 'IP',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'auth_type','status','ip_address','mac_address'
        $field = 'mac_address';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'MAC',
            'placeholder' => 'MAC',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'technology',
        $field = 'technology';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Tecnologia',
            'placeholder' => 'Tecnologia',
            'options' => [
                [
                    'value' => 'ftth',
                    'text' => 'FTTH - Fibra Ótica',
                ],
                [
                    'value' => 'w58',
                    'text' => 'Wireless 5.8 GHz',
                ],
                [
                    'value' => 'w24',
                    'text' => 'Wireless 2.4 GHz',
                ],
                [
                    'value' => 'metro_utp',
                    'text' => 'Metro / UTP',
                ],
            ],
        ];
        $fields[$field] = $$field;

        //'items_comodato',
        $field = 'items_comodato';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Itens em Comodato',
            'placeholder' => 'Itens em Comodato',
            'options' => [
            ],
        ];
        $fields[$field] = $$field;

        //'financial_api'
        $field = 'financial_api';
//        $aux = substr($field, 0,-3);
//        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
        $options = [
            [
                'value' => 'gerencia_net',
                'text' => 'Gerência Net',
            ],
            [
                'value' => 'boleto_facil',
                'text' => 'Boleto Fácil',
            ],
        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'API Padrão',
            'placeholder' => 'API Padrão',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        $field = 'free';
//        $aux = substr($field, 0,-3);
//        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
        $options = [
            [
                'value' => '0',
                'text' => 'Não',
            ],
            [
                'value' => '1',
                'text' => 'Sim',
            ],
        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Isento de Mensalidade',
            'placeholder' => '',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'discount_pay', 'extra_pay',
        $field = 'discount_pay';
//        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
//        $options = [
//            [
//                'value' => '',
//                'text' => '',
//            ],
//        ];
        $$field = [
            'type' => 'number',
            'name' => $field,
            'label' => 'Desconto ( - R$ )',
            'placeholder' => '14.50',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'discount_pay', 'extra_pay',
        $field = 'extra_pay';
//        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
//        $options = [
//            [
//                'value' => '',
//                'text' => '',
//            ],
//        ];
        $$field = [
            'type' => 'number',
            'name' => $field,
            'label' => 'Extras ( + R$ )',
            'placeholder' => '25.55',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //pay_day
        $field = 'pay_day';
//        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
        for ($i=1;$i<29;$i++) {
            $text = 'Dia '.$i.' de cada mês';
            $options[] = [
                'value' => $i,
                'text' => $text,
            ];
        }
//        $options = [
//            [
//                'value' => '',
//                'text' => '',
//            ],
//        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Vencimento Fatura',
            'placeholder' => 'Vencimento Fatura',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'auto_block'
        $field = 'auto_block';
//        $aux = substr($field, 0,-3);
//        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
        $options = [
            [
                'value' => '1',
                'text' => 'Sim',
            ],
            [
                'value' => '0',
                'text' => 'Não',
            ],
        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Bloqueio Automático ?',
            'placeholder' => 'Bloqueio Automático ?',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'days_to_block'
        $field = 'days_to_block';
//        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
//        $options = [
//            [
//                'value' => '',
//                'text' => '',
//            ],
//        ];
        $$field = [
            'type' => 'number',
            'name' => $field,
            'label' => 'Dias para bloqueio',
            'placeholder' => 'Dias para bloqueio',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'comment'
        $field = 'comment';
//        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
//        $options = [
//            [
//                'value' => '',
//                'text' => '',
//            ],
//        ];
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Comentário',
            'placeholder' => 'Comentário',
            'options' => $options,
        ];
        $fields[$field] = $$field;

//        $aux = [];
        //colocar em uma ordem especificada
//        $names = ['auth_type','status','ip_address','mac_address','login', 'password','technology',
//            'financial_api','items_comodato'];
//        foreach ($names as $name)
//        {
//            $aux[] = $fields[$name];
//        }
        //colocar sem ordem ou na ordem do Controller::form() ( método form dos controladores )
//        foreach ($fields as $field)
//        {
//            $aux[] = $field;
//        }
//        $fields = $aux;

        //$fields = array_slice($fields, 0);
        return [$fields];
    }
}
