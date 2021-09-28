<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends BaseModel
{
    protected $with = ['user'];

    protected $cascadeDeletes = ['cartProducts'];

    protected $appends = ['cartProducts'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cartProducts(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function getCartProductsAttribute() {
        return CartProduct::where('cart_products.cart_id', '=', $this->id)
            ->get();
    }
}
