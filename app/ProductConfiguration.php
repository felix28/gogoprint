<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductConfiguration extends Model
{
    protected $fillable = [
        'name',
        'price',
        'paper_format_id',
        'page_id',
        'paper_type_id'
    ];

    public function paper_format()
    {
        return $this->belongsTo('App\PaperFormat');
    }

    public function page()
    {
        return $this->belongsTo('App\Page');
    }

    public function paper_type()
    {
        return $this->belongsTo('App\PaperType');
    }

    public function product_quantity_prices()
    {
        return $this->hasMany('App\ProductQuantityPrice');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
