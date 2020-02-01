<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Model extends Model
{
    //
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

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

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _123()
    {
        return (new ThisModel123())->fillable;
    }
    public static function fields()
    {
        return ThisModel123::_123();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'field1','field2','field3',
        //'model_id'
        $field = '';
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
            'type' => '',
            'name' => $field,
            'label' => '',
            'placeholder' => '',
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

        //pode dar erro por causa dessa linha que exclui o primeiro campo que podia ficar em branco para reuso
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

    /**
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function record()
    {
        return $this->hasOne('App\Record');
    }

    /**
     * Get the records for this.
     */
    public function records()
    {
        return $this->hasMany('App\Record');
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function own()
    {
        return $this->belongsTo('App\Own');
    }
}
