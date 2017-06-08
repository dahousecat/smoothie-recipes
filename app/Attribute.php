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

/*

php artisan make:controller AttributeController --resource --model=Attribute
php artisan make:controller IngredientController --resource --model=Ingredient
php artisan make:controller RecipeController --resource --model=Recipe
php artisan make:controller RowController --resource --model=Row
php artisan make:controller StepController --resource --model=Step
php artisan make:controller UnitController --resource --model=Unit
php artisan make:controller UserController --resource --model=User