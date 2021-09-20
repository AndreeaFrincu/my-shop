<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends BaseModel
{
    use HasApiTokens, Notifiable, Authenticatable;

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
