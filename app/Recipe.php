<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The steps that belong to the recipe.
     */
    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    /**
     * The rows that belong to the recipe.
     */
    public function rows()
    {
        return $this->hasMany('App\Row');
    }
}
