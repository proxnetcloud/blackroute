<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metro_UTP extends Model
{
    //
    protected $table = 'metro_utp';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'caixa_switch','fonte_poe','switch_port','vlan',
        'subscription_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580341162269()
    {
        return (new Metro_UTP())->fillable;
    }
    public static function fields()
    {
        return Metro_UTP::_1580341162269();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'caixa_switch','fonte_poe','switch_port','vlan',
        //'model_id'
        $field = 'caixa_switch';
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
            'label' => 'Caixa / Switch',
            'placeholder' => 'Caixa / Switch',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'caixa_switch','fonte_poe','switch_port','vlan',
        //'model_id'
        $field = 'fonte_poe';
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
            'label' => 'Fonte POE',
            'placeholder' => 'Fonte POE',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'caixa_switch','fonte_poe','switch_port','vlan',
        //'model_id'
        $field = 'switch_port';
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
            'label' => 'Porta Switch',
            'placeholder' => 'Porta Switch',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'caixa_switch','fonte_poe','switch_port','vlan',
        //'model_id'
        $field = 'vlan';
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
            'label' => 'VLan',
            'placeholder' => 'VLan',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //colocar em uma ordem especificada
        $names = ['caixa_switch','fonte_poe','switch_port','vlan',];
        $aux = [];
        foreach ($names as $name)
        {
            $aux[] = $fields[$name];
        }
        $fields = $aux;

//        $fields = array_slice($fields, 1);
        return [$fields];
    }
}
