<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
    ];

    /**
     * The units that belong to the ingredient.
     */
    public function units()
    {
        return $this->belongsToMany('App\Unit');
    }

    /**
     * The attributes that belong to the ingredient.
     */
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute');
    }

}
