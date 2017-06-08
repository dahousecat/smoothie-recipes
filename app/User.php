<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The recipes that belong to the user.
     */
    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }

    /**
     * The ingredients that belong to the user.
     */
    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }
}
