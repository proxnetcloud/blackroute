<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = ['status', 'comment',
        'auto_block', 'pay_day', 'discount_pay', 'extra_pay',
        'has_to_pay', 'days_to_block', 'auth_type', 'technology',

        'login', 'password',

        'ip_address', 'mac_address',
        'can_change_password',

        'block_ins','ap_ins',
        'block_pay','ap_pay','has_comodato','items_comodato',

        'olt', 'pon_port', 'cto_number', 'cto_splitter', 'onu_olt_model',
        'onu_serial', 'onu_mac', 'onu_ip', 'vlan_id',
        'w58_ssid', 'w58_password', 'w58_ap_client', 'w58_radio_ip',
        'w58_vlan_id', 'w24_ssid', 'w24_password',
        'w24_ap_client', 'w24_radio_ip', 'w24_vlan_id', 'caixa_switch',
        'ppoe_fonte', 'switch_port', 'metro_utp_vlan_id'
        ,
        'netflix'
        ,'router'
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

        //'login', 'password',
//        $field = '';
//        $$field = [
//            'type' => '',
//            'name' => $field,
//            'label' => '',
//            'placeholder' => '',
//            'options' => [
//                [
//                    'value' => '',
//                    'text' => '',
//                ],
//            ],
//        ];
//        $fields[] = $$field;

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
        $fields[] = $$field;

        //'login', 'password',
        $field = 'password';
        $$field = [
            'type' => 'password',
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
        $fields[] = $$field;

        //'login', 'password',
        $field = 'ip';
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
        $fields[] = $$field;

        //$fields = array_slice($fields, 0);
        return [$fields];
    }
}
