<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //phone tem tabela especifica
    protected $fillable = [
        'name', 'cpf', 'rg', 'birth', 'email','person','representative_id','civil_state',
        'juridica_type',
    ];

    // Para retornar os fillable
    //...pois não podem ser acessados externamente...
    //...pois são protected e para evitar possíveis...
    //...problemas futuros por ser padrão do Laravel...
    //...não altero .
    //Para permitir a geração de aliases
    public static function _1580001396054()
    {
        return (new People())->fillable;
    }
    public static function fields()
    {
        return People::_1580001396054();
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    /**
     * Get the object that owns this.
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public static function form()
    {
        $fields = [];

        // 'field1','field2','field3',
        //'birth', 'email','person','representative_cpf','civil_state',
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

        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $field = 'name';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Nome',
            'placeholder' => 'Nome',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $field = 'cpf';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'CPF',
            'placeholder' => 'CPF',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //'cnpj', 'user_id', 'address_id', 'business_name', 'billing',
        $field = 'rg';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'RG',
            'placeholder' => 'RG',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //'birth', 'email','person','representative_cpf','civil_state',
        $field = 'birth';
        $$field = [
            'type' => 'date',
            'name' => $field,
            'label' => 'Data de Nascimento',
            'placeholder' => '01/01/2000',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //'birth', 'email','person','representative_cpf','civil_state',
        $field = 'email';
        $$field = [
            'type' => 'email',
            'name' => $field,
            'label' => 'Email',
            'placeholder' => 'email@email.com',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //'birth', 'email','person','representative_cpf','civil_state',
        $field = 'person';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Tipo de Pessoa',
            'placeholder' => 'jurídica/física',
            'options' => [
                [
                    'value' => 'fisica',
                    'text' => 'Física',
                ],
                [
                    'value' => 'juridica',
                    'text' => 'Jurídica',
                ],
            ],
        ];
        $fields[] = $$field;

//        //'birth', 'email','person','representative_cpf','civil_state',
//        $field = 'representative_cpf';
//        $$field = [
//            'type' => 'text',
//            'name' => $field,
//            'label' => '',
//            'placeholder' => '',
//            'options' => [
//                [
//                    'value' => '',
//                    'text' => '',
//                ],
//            ],
//        ];
//        $fields[] = $$field;

        //'birth', 'email','person','representative_cpf','civil_state',
        $field = 'civil_state';
        $$field = [
            'type' => 'text',
            'name' => $field,
            'label' => 'Estado Civil',
            'placeholder' => 'Estado Civil',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        //juridica_type
        $field = 'juridica_type';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Tipo de Pessoa Jurídica',
            'placeholder' => 'Tipo de Pessoa Jurídica',
            'options' => [
                [
                    'value' => 'comercial-industrial',
                    'text' => 'Comercial / Industrial',
                ],
                [
                    'value' => 'poder-publico',
                    'text' => 'Poder Público',
                ],
                [
                    'value' => 'publico',
                    'text' => 'Público',
                ],
                [
                    'value' => 'semi-publico',
                    'text' => 'Semi-Público',
                ],
                [
                    'value' => 'provedor-scm',
                    'text' => 'Provedor SCM',
                ],
                [
                    'value' => 'residencial',
                    'text' => 'Residencial',
                ],
                [
                    'value' => 'outros',
                    'text' => 'Outros',
                ],
            ],
        ];
        $fields[] = $$field;

        $fields = array_slice($fields, 1);
        return [$fields];
    }

    /**
     * Get the object that owns this.
     */
    public function client()
    {
        return $this->hasOne('App\Client');
    }

    /**
     * Get the object that owns this.
     */
    public function phone()
    {
        return $this->belongsTo('App\Phone');
    }

    /**
     * Get the records for this.
     */
    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

    /**
     * Get the record associated with this.
     */
//    public function company()
//    {
//        return $this->hasOne('App\People','representative_id');
//    }

    /**
     * Get the object that owns this.
     */
    public function representative()
    {
        return $this->belongsTo('App\People','representative_id');
    }
}
