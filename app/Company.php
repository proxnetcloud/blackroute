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
        'cnpj', 'user_id',
    ];

    public function _1579740202755()
    {
        return $this->fillable;
    }
    public function fields()
    {
        return $this->_1579740202755();
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
}
