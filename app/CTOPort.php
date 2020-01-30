<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTOPort extends Model
{
    //
    protected $table = 'cto_port';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cto_id','port','company_id',
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
     * Get the record associated with this.
     */
    //fica no Model que NÃO tem o id
    public function ftth()
    {
        return $this->hasOne('App\FTTH','cto_port_id');
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function cto()
    {
        return $this->belongsTo('App\CTO','cto_id');
    }

    /**
     * Get the record associated with this.
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
    public static function _1580332911194()
    {
        return (new CTOPort())->fillable;
    }
    public static function fields()
    {
        return CTOPort::_1580332911194();
    }

    // Para permitir a geração do FrontEnd de forma automatizada
    // ... Principalmente formulários
    public static function form()
    {
        $fields = [];

        // 'field1','field2','field3',
        //cto_port_id
        $field = 'cto_port_id';
        $aux = substr($field, 0,-3).'s';
        $options = [];
        foreach (\Auth::user()->company->$aux as $once) {
//            $option = [
            $text = 'Splitter '.$once->port.' : ';
//            if ( isset($once->ftth->subscription->client->people->name))
            if ( isset($once->ftth->subscription->login))
            {
                $text .= 'Usado por '.$once->ftth->subscription->login;
            }
            else
            {
                $text .= 'Livre para uso';
            }
            $options[] = [
                'value' => $once->id,
                'text' => $text,
            ];
//            $options[] = $option;
        }
        $$field = [
            'type' => 'select',
            'name' => $field,
            'label' => 'CTO Splitter',
            'placeholder' => 'CTO Splitter',
            'options' => $options,
        ];
        $fields[$field] = $$field;

        //colocar em uma ordem especificada
        $names = ['cto_port_id',];
        $aux = [];
        foreach ($names as $name)
        {
            $aux[] = $fields[$name];
        }
        $fields = $aux;

        $fields = array_slice($fields, 1);
        return [$fields];
    }
}
