<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'recipe_id',
        'delta',
        'text',
        'image',
    ];

    /**
     * Get the recipe that owns the step.
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
