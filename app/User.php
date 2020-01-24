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
        'name', 'email', 'password',
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
    public function fields()
    {
        return $this->_1579738929956();
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
}
