<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field', 'table', 'type', 'name', 'label', 'placeholder',
    ];

    public static function fields()
    {
        return (new Field())->fillable;
    }

    public function option()
    {
        return $this->hasMany('App\Option');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
