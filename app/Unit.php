<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    /**
     * The ingredients that belong to the unit.
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
}
