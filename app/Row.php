<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'delta',
        'unit_id',
        'unit_value',
    ];

    public $timestamps = false;

    /**
     * Get the ingredient for this row.
     */
    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    /**
     * Get the recipe that owns the row.
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    /**
     * Get the unit for the row
     */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

}
