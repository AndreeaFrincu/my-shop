<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends BaseModel
{
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
