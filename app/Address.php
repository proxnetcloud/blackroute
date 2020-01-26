<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        'condominium','apartment','people_id',
    ];

    /**
     * Get the record associated with this.
     */
    public function _people()
    {
        return $this->hasOne('App\People');
    }

    public function people()
    {
        return $this->belongsTo('App\People');
    }

    public static function fields()
    {
        return (new Address())->fillable;
    }

    public static function form()
    {
        //$options =
        $fields = [];

        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'address';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Endereço',
            'placeholder' => 'Endereço',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'number';
        $$field = [
            'type' => 'number',
            'name' => $field,
            'label' => 'Número',
            'placeholder' => 'Número',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;
        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'zip';
        $$field = [
            'type' => 'zip',
            'name' => $field,
            'label' => 'CEP',
            'placeholder' => 'CEP',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;
        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'neighborhood';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Bairro',
            'placeholder' => 'Bairro',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;
        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'city';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Cidade',
            'placeholder' => 'Cidade',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;
        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'complement';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Complemento',
            'placeholder' => 'Complemento',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;
        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'state';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Estado',
            'placeholder' => 'Estado',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;
        //'address', 'number', 'zip', 'neighborhood', 'city', 'complement', 'state', 'country',
        $field = 'country';
        $$field = [
            'type' => 'country',
            'name' => $field,
            'label' => 'País',
            'placeholder' => 'País',
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
