<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends BaseModel
{

    public $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email'
    ];

    protected $cascadeDeletes = ['orders', 'carts'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
