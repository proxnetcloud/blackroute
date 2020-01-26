<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'people_id',
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

    // Para permitir a geração de aliases
    public static function _1580006184554()
    {
        return (new Client())->fillable;
    }
    public static function fields()
    {
        return Client::_1580006184554();
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
    public function people()
    {
        return $this->hasOne('App\People');
    }
}
