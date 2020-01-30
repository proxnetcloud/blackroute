<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTO extends Model
{
    //
    //quando for criada cada cto também tem que popular a tabela de cto_port com todas as portas
    //...para não dar erro ao recuperar as portas por backend php para popular o select do form cliente
    protected $table = 'cto';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','number','capacity','coordinates',
        'company_id',
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
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function ftth()
    {
        return $this->hasOne('App\FTTH','cto_id');
    }

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function cto_ports()
    {
        return $this->hasMany('App\CTOPort','cto_id');
    }

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580333001494()
    {
        return (new CTO())->fillable;
    }
    public static function fields()
    {
        return CTO::_1580333001494();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'field1','field2','field3',
        //cto_id
        $field = 'cto_id';
        $aux = substr($field, 0,-3).'s';
        $options = [];
        foreach (\Auth::user()->company->$aux as $once) {
//            $text = '#'.$once->number.' - '.$once->name.' ( Capacidade '.$once->capacity.' )';
            $text = '#'.$once->id.' - '.$once->name.' ( Capacidade '.$once->capacity.' )';
            $options[] = [
                'value' => $once->id,
                'text' => $text,
            ];
        }
        $field = 'cto_id';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'CTO',
            'placeholder' => 'CTO',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //        'name','number','capacity','coordinates',
        $field = 'name';
//        $aux = substr($field, 0,-3).'s';
        $options = [];
//        foreach (\Auth::user()->company->$aux as $once) {
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
            'label' => 'Nome',
            'placeholder' => 'Nome',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //        'name','number','capacity','coordinates',
        $field = 'number';
//        $aux = substr($field, 0,-3).'s';
        $options = [];
//        foreach (\Auth::user()->company->$aux as $once) {
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
            'label' => 'Número',
            'placeholder' => 'Número',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //        'name','number','capacity','coordinates',
        $field = 'capacity';
//        $aux = substr($field, 0,-3).'s';
        $options = [];
//        foreach (\Auth::user()->company->$aux as $once) {
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
            'label' => 'Capacidade',
            'placeholder' => 'Capacidade',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //        'name','number','capacity','coordinates',
        $field = 'coordinates';
//        $aux = substr($field, 0,-3).'s';
        $options = [];
//        foreach (\Auth::user()->company->$aux as $once) {
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
            'label' => 'Coordenadas',
            'placeholder' => 'Coordenadas',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //colocar em uma ordem especificada
        $names = ['name','number','capacity','coordinates','cto_id',];
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
