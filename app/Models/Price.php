<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Price extends BaseModel
{
    protected $cascadeDeletes = ['productPrices'];

    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }
}
