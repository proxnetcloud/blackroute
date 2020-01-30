<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','text','company_id',
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

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580344852932()
    {
        return (new Document())->fillable;
    }
    public static function fields()
    {
        return Document::_1580344852932();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'field1','field2','field3',
        //'model_id'
        $field = 'document_id';
        $aux = substr($field, 0,-3).'s';
        $options = [];
        foreach (\Auth::user()->company->$aux as $once) {
//            $text = '';
            $options[] = [
                'value' => $once->id,
//                'text' => $text,
                'text' => $once->name,
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
            'label' => 'Contrato',
            'placeholder' => 'Contrato',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //colocar em uma ordem especificada
        $names = ['document_id',];
        $aux = [];
        foreach ($names as $name)
        {
            $aux[] = $fields[$name];
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
