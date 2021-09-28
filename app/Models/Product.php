<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends BaseModel
{
    protected $with = ['author', 'genre'];

    protected $appends = ['currentPrice'];

    protected $cascadeDeletes = ['productPrices', 'cartProducts'];

    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function cartProducts(): HasMany
    {
        return $this->hasMany(CartProduct::class);
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

    public function scopeCurrentPrice($query) {
        return $query->whereHas('productPrices', function ($query) {
            return $query
                ->where(function ($query) {
                    $query->where('start_date', '<', Carbon::today()->format('Y-m-d'))
                        ->where('end_date', '>', Carbon::today()->format('Y-m-d'));
                })
                ->orWhere(function ($query) {
                    $query->whereNull('start_date')
                        ->where('end_date', '>', Carbon::today()->format('Y-m-d'));
                })
                ->orWhere(function ($query) {
                    $query->where('start_date', '<', Carbon::today()->format('Y-m-d'))
                        ->whereNull('end_date');

                })
                ->orWhere(function ($query) {
                    $query->whereNull('start_date')
                        ->whereNull('end_date');
                });
        });
    }

    public function getCurrentPriceAttribute()
    {
        return ProductPrice::where('product_prices.product_id', '=', $this->id)
        ->whereNested( function ($q1) {
            $q1->where(function ($query) {
                $query->whereNull('start_date')
                    ->whereNull('end_date');
                })
                ->orWhere(function ($query) {
                    $query->whereNull('start_date')
                        ->where('end_date', '>', Carbon::today()->format('Y-m-d'));
                })
                ->orWhere(function ($query) {
                    $query->where('start_date', '<', Carbon::today()->format('Y-m-d'))
                        ->whereNull('end_date');

                })
                ->orWhere(function ($query) {
                    $query->where('start_date', '<', Carbon::today()->format('Y-m-d'))
                        ->where('end_date', '>', Carbon::today()->format('Y-m-d'));
                });
            })
            ->first();
    }
}
