<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wireless extends Model
{
    //
    protected $table = 'wireless';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ssid','password','radio','ip','vlan','frequency',
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
    public static function _1580341031969()
    {
        return (new Wireless())->fillable;
    }
    public static function fields()
    {
        return Wireless::_1580341031969();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'ssid','password','radio','ip','vlan','frequency',
        $field = 'ssid';
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
            'label' => 'Conectado em Acess Point',//acess point também é conhecido como ap
            'placeholder' => 'Nome do Acess Point',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'ssid','password','radio','ip','vlan','frequency',
        $field = 'password';
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
            'label' => 'Senha Acess Point',
            'placeholder' => 'Senha Acess Point',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'ssid','password','radio','ip','vlan','frequency',
        $field = 'radio';
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
                'value' => 'NanoStation LocoM5 13dbi',
                'text' => 'NanoStation LocoM5 13dbi',
            ],
            [
                'value' => 'NanoStation M5 16dbi',
                'text' => 'NanoStation M5 16dbi',
            ],
            [
                'value' => 'PowerBeam M5 22dbi',
                'text' => 'PowerBeam M5 22dbi',
            ],
            [
                'value' => 'PowerBeam 25dbi',
                'text' => 'PowerBeam 25dbi',
            ],
            [
                'value' => 'AirGrid M5 23dbi',
                'text' => 'AirGrid M5 23dbi',
            ],
            [
                'value' => 'AirGrid 27dbi',
                'text' => 'AirGrid 27dbi',
            ],
            [
                'value' => 'LiteBeam 23dbi',
                'text' => 'LiteBeam 23dbi',
            ],
            [
                'value' => 'SXT Lite 5NDR2 16dbi',
                'text' => 'SXT Lite 5NDR2 16dbi',
            ],
            [
                'value' => 'IntelBras Wom 5000i 16dbi',
                'text' => 'IntelBras Wom 5000i 16dbi',
            ],
            [
                'value' => 'IntelBras Wom 5000i 12dbi',
                'text' => 'IntelBras Wom 5000i 12dbi',
            ],
            [
                'value' => 'IntelBras Lite Beam Won 5A-23 23dbi',
                'text' => 'IntelBras Lite Beam Won 5A-23 23dbi',
            ],
        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'AP do Cliente - Rádio',
            'placeholder' => 'AP do Cliente',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'ssid','password','radio','ip','vlan','frequency',
        $field = 'ip';
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
            'label' => 'IP de acesso do AP do cliente',
            'placeholder' => '10.0.2.0',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'ssid','password','radio','ip','vlan','frequency',
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

        $aux = [];
        //colocar em uma ordem especificada
//        $names = ['field1', 'field2', 'field3',];
//        foreach ($names as $name)
//        {
//            $aux[] = $fields[$name];
//        }
        //colocar sem ordem
        foreach ($fields as $field)
        {
            $aux[] = $field;
        }
        $fields = $aux;

        $fields = array_slice($fields, 1);
        return [$fields];

        //novo modelo de campo
//        $$field = [
//            'label' => '',
//            'type' => '',
        //se o elemento html é finalizado com '>' ou com '</select>' por exemplo
//            'has_key_end' => 1,
//            'attr' => [
//                'type' => 'text',
//                'value' => '',
//                'placeholder' => '',
//                'name' => $field,
//            ],
//            'options' => $options,
//        ];
    }
}
