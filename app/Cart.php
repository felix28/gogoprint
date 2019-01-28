<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_configuration_id',
        'configuration_price',
        'price_per_piece',
        'quantity',
        'production_days',
        'subtotal',
        'vat',
        'shipping_fee',
        'total',
        'delivery_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function production_configuration()
    {
        return $this->belongsTo('App\ProductConfiguration');
    }
}
