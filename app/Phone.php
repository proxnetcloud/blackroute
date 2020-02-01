<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //phone tem tabela especifica
    protected $fillable = [
        'number','people_id','type',
    ];

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580005586054()
    {
        return (new Phone())->fillable;
    }
    public static function fields()
    {
        return Phone::_1580005586054();
    }

    public static function form()
    {
        $fields = [];

        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $field = 'number';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Telefone',
            'placeholder' => 'Telefone',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        return [$fields];
    }

    /**
     * Get the record associated with this.
     */
    public function people()
    {
        return $this->hasOne('App\People');
    }

    /**
     * Get the object that owns this.
     */
    public function _people()
    {
        return $this->belongsTo('App\People');
    }
}
