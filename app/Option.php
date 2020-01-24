<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'text',
    ];

    public function fields()
    {
        return $this->fillable;
    }

    public function field()
    {
        return $this->belongsTo('App\Field');
    }
}
