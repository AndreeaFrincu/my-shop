<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends BaseModel
{
    protected $cascadeDeletes = ['products'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
