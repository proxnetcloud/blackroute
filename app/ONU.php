<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ONU extends Model
{
    //
    protected $table = 'onu';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model', 'serial', 'mac', 'ip',
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
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function ftth()
    {
        return $this->hasOne('App\FTTH','onu_id');
    }

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580338130064()
    {
        return (new ONU())->fillable;
    }
    public static function fields()
    {
        return ONU::_1580338130064();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'model', 'serial', 'mac', 'ip',
        $field = 'model';
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
                'value' => 'Furukawa-ONU100',
                'text' => 'Furukawa-ONU100',
            ],
            [
                'value' => 'Furukawa-ONU-Wireless-LD1102',
                'text' => 'Furukawa-ONU-Wireless-LD1102',
            ],
            [
                'value' => 'FiberHome-ONU-AN5506-02-b',
                'text' => 'FiberHome-ONU-AN5506-02-b',
            ],
            [
                'value' => 'FiberHome-ONU-AN5506-01-a',
                'text' => 'FiberHome-ONU-AN5506-01-a',
            ],
            [
                'value' => 'FiberHome-ONU-Wireless-AN5506-04',
                'text' => 'FiberHome-ONU-Wireless-AN5506-04',
            ],
            [
                'value' => 'FiberHome-ONU-Wireless-AN5506-02-fg',
                'text' => 'FiberHome-ONU-Wireless-AN5506-02-fg',
            ],
            [
                'value' => 'IntelBras-ONU-110',
                'text' => 'IntelBras-ONU-110',
            ],
            [
                'value' => 'IntelBras-ONU-110b',
                'text' => 'IntelBras-ONU-110b',
            ],
            [
                'value' => 'IntelBras-ONT-142-ng',
                'text' => 'IntelBras-ONT-142-ng',
            ],
            [
                'value' => 'Ubiquiti-ONU-uFiber-Nano-g',
                'text' => 'Ubiquiti-ONU-uFiber-Nano-g',
            ],
            [
                'value' => 'Ubiquiti-ONU-uFiber-Loco',
                'text' => 'Ubiquiti-ONU-uFiber-Loco',
            ],
        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Modelo ONU / ONT',
            'placeholder' => 'Modelo ONU / ONT',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'model', 'serial', 'mac', 'ip',
        $field = 'serial';
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
//                'value' => 'Furukawa-ONU100',
//                'text' => 'Furukawa-ONU100',
//            ],
//        ];
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'ONU / Serial',
            'placeholder' => 'ONU / Serial',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'model', 'serial', 'mac', 'ip',
        $field = 'mac';
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
//                'value' => 'Furukawa-ONU100',
//                'text' => 'Furukawa-ONU100',
//            ],
//        ];
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'ONU / Mac',
            'placeholder' => '29:F1:D5:82:46:7E',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        // 'model', 'serial', 'mac', 'ip',
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
//                'value' => 'Furukawa-ONU100',
//                'text' => 'Furukawa-ONU100',
//            ],
//        ];
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'IP de acesso da ONU',
            'placeholder' => '10.0.1.1',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //colocar em uma ordem especificada
        $names = [ 'model', 'serial', 'mac', 'ip',];
        $aux = [];
        foreach ($names as $name)
        {
            $aux[] = $fields[$name];
        }
        $fields = $aux;

        $fields = array_slice($fields, 1);
        return [$fields];
    }
}