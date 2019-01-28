<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperFormat extends Model
{
    protected $fillable = [
        'width',
        'height',
        'unit'
    ];

    public function product_configurations()
    {
        return $this->hasMany('App\ProductConfiguration');
    }
}
