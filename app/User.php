<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id', 'cpf', 'rg', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function _1579738929956()
    {
        return $this->fillable;
    }
    public static function fields()
    {
        return (new User())->_1579738929956();
    }
    public static function form()
    {
        //$options =
        $fields = [];

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

        $field = 'email';
        $$field = [
            'type' => 'email',
            'name' => $field,
            'label' => 'Email',
            'placeholder' => 'Email',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

        $field = 'password';
        $$field = [
            'type' => 'password',
            'name' => $field,
            'label' => 'Senha',
            'placeholder' => 'Senha',
            'options' => [
                [
                    'value' => '',
                    'text' => '',
                ],
            ],
        ];
        $fields[] = $$field;

//        // 'company_id', 'cpf', 'rg', 'phone',
//        $field = 'company_id';
//        $$field = [
//            'type' => 'number',
//            'name' => $field,
//            'label' => 'ID do negócio',
//            'placeholder' => 'ID do negócio',
//            'options' => [
//                [
//                    'value' => '',
//                    'text' => '',
//                ],
//            ],
//        ];
//        $fields[] = $$field;

        // 'company_id', 'cpf', 'rg', 'phone',
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
        // 'company_id', 'cpf', 'rg', 'phone',
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
        // 'company_id', 'cpf', 'rg', 'phone',
        $field = 'phone';
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
     * Get the company record associated with the user.
     */
    public function company()
    {
        return $this->hasOne('App\Company');
    }

    // pode dar erro pois existe varios users com o mesmo id de company
    /**
     * Get the company that owns the user.
     */
    public function _company()
    {
        return $this->belongsTo('App\Company');
    }

    public function field()
    {
        return $this->hasMany('App\Field');
    }
}
