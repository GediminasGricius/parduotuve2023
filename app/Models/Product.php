<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('count','price')->withTimestamps();;
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => strtoupper($value),
            set: fn ( $value) => strtolower($value)
        );
    }

    protected function priceEur(): Attribute
    {
        return Attribute::make(
            get: fn ( $value, $attributes) => $attributes['price']." EUR",
        );
    }

    protected function priceVat(): Attribute
    {
        return Attribute::make(
            get: fn ( $value, $attributes) => round($attributes['price']*1.21, 2)." EUR",
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
