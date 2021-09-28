<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartProduct extends BaseModel
{
    protected $with = ['product'];

//    protected $appends = ['cart'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function getCartAttribute() {
        return Cart::where('carts.id', '=', $this->cart_id)
            ->get();
    }
}
