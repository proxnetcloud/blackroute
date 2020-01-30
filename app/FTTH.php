<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FTTH extends Model
{
    //
    protected $table = 'ftth';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscription_id','olt','pon_port','cto_id','cto_port_id','onu_id','vlan',
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

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function cto()
    {
        return $this->belongsTo('App\CTO','cto_id');
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function cto_port()
    {
        return $this->belongsTo('App\CTOPort','cto_port_id');
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function onu()
    {
        return $this->belongsTo('App\ONU','onu_id');
    }

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580336646304()
    {
        return (new FTTH())->fillable;
    }
    public static function fields()
    {
        return FTTH::_1580336646304();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        //'olt','pon_port','cto_id','cto_port_id','onu_id','vlan',
        $field = 'olt';
        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
//            $text = '';
//            $options[] = [
//                'value' => $once->id,
//                'text' => $text,
//            ];
//        }
        $options = [
            [
                'value' => 'Furukawa',
                'text' => 'Furukawa',
            ],
            [
                'value' => 'FiberHome',
                'text' => 'FiberHome',
            ],
            [
                'value' => 'IntelBras',
                'text' => 'IntelBras',
            ],
            [
                'value' => 'Ubiquiti',
                'text' => 'Ubiquiti',
            ],
        ];
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'OLT',
            'placeholder' => 'OLT',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'olt','pon_port','cto_id','cto_port_id','onu_id','vlan',
        $field = 'pon_port';
        $aux = substr($field, 0,-3);
        $options = [];
//        foreach (Auth::user()->company->$aux as $once) {
        for ($i=1;$i<17;$i++) {
//            $text = '';
            $options[] = [
                'value' => $i,
                'text' => $i,
            ];
        }
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'OLT',
            'placeholder' => 'OLT',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //'olt','pon_port','cto_id','cto_port_id','onu_id','vlan',
        $field = 'vlan';
        $aux = substr($field, 0,-3);
        $options = [];
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
    }
}
