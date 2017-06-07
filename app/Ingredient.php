<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The units that belong to the ingredient.
     */
    public function units()
    {
        return $this->belongsToMany('App\Unit');
    }

    /**
     * The units that belong to the ingredient.
     */
    public function rows()
    {
        return $this->belongsToMany('App\Row');
    }
}
