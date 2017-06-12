<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The steps that belong to the recipe.
     */
    public function steps()
    {
        return $this->hasMany('App\Models\Step');
    }

    /**
     * The rows that belong to the recipe.
     */
    public function rows()
    {
        return $this->hasMany('App\Models\Row');
    }

    /**
     * Get the user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
