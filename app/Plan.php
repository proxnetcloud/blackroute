<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
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
    public static function _1580323320808()
    {
        return (new Plan())->fillable;
    }
    public static function fields()
    {
        return Plan::_1580323320808();
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'field1','field2','field3',
        $options = [];
        foreach (\Auth::user()->company->plans as $plan) {
//            $option = [
            $options[] = [
                'value' => $plan->id,
                'text' => $plan->name,
            ];
//            $options[] = $option;
        }
        $field = 'plan_id';
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'Plano',
            'placeholder' => 'Plano',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //colocar em uma ordem especificada
        $names = ['plan_id',];
        $aux = [];
        foreach ($names as $name)
        {
            $aux[] = $fields[$name];
        }

        $fields = array_slice($fields, 1);
        return [$fields];
    }
}
