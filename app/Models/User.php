<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends BaseModel
{
    protected $cascadeDeletes = ['orders'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
