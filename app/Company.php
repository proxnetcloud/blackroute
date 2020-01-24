<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
    ];

    public function _1579740202755()
    {
        return $this->fillable;
    }
    public static function fields()
    {
        return (new Company())->_1579740202755();
    }

    // pode dar erro pois existe varios users com o mesmo id de company
    /**
     * Get the user that owns the company .
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the users for the company
     */
    public function _user()
    {
        return $this->hasMany('App\Company');
    }

    public function field()
    {
        return $this->hasMany('App\Field');
    }

    public static function form()
    {
        //$options =
        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $fields = [];

        $field = 'cnpj';
        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'CNPJ',
            'placeholder' => 'CNPJ',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

//        $field = 'user_id';
//        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
//        $$field = [
//            'type' => 'number',
//            'name' => $field,
//            'label' => 'ID do usuário',
//            'placeholder' => 'ID do usuário',
//            'options' => [
//                [
//                    'value' => '',
//                    'text' => '',
//                ],
//            ],
//        ];
//        $fields[] = $$field;

//        $field = 'address_id';
//        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
//        $$field = [
//            'type' => 'number',
//            'name' => $field,
//            'label' => 'ID do endereço',
//            'placeholder' => 'ID do endereço',
//            'options' => [
//                [
//                    'value' => '',
//                    'text' => '',
//                ],
//            ],
//        ];
//        $fields[] = $$field;

        $field = 'business_name';
        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Nome Fantasia',
            'placeholder' => 'Nome Fantasia',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        $field = 'billing';
        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $$field = [
            'type' => 'number',
            'name' => $field,
            'label' => 'Dia de vencimento',
            'placeholder' => 'Dia de vencimento',
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
}
