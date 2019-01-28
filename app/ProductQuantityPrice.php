<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductQuantityPrice extends Model
{
    protected $fillable = ['product_configuration_id', 'quantity', 'price_per_piece'];

    public function product_configuration()
    {
        return $this->belongsTo('App\ProductConfiguration');
    }
}
