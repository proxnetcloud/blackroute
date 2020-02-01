<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentSubscription extends Model
{
    //
    protected $table = 'document_subscription';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'subscription_id','document_id',
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
    public static function _1580424779353()
    {
        return (new DocumentSubscription())->fillable;
    }
    public static function fields()
    {
        return DocumentSubscription::_1580424779353();
    }

    /**
     * Get the object that owns this.
     */
    //fica no Model que tem o id
    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }
}
