<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    /**
     * The ingredients that have this attribute.
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
}
