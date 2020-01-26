<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Model extends Model
{
    //
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
        $field = '';
        $$field = [
            'type' => '',
            'name' => $field,
            'label' => '',
            'placeholder' => '',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        $fields = array_slice($fields, 1);
        return [$fields];
    }

    /**
     * Get the record associated with this.
     */
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
    public function own()
    {
        return $this->belongsTo('App\Own');
    }
}
