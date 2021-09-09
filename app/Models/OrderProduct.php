<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends BaseModel
{

    public function productPrice(): BelongsTo
    {
        return $this->belongsTo(ProductPrice::class, );
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'order_id');
    }
}
