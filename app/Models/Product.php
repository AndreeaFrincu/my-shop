<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends BaseModel
{
    protected $with = ['author', 'genre'];

    protected $cascadeDeletes = ['productPrices'];

    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where("title","like","%".$search."%");
    }
}
