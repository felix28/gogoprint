<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['pages', 'description'];

    public function product_configurations()
    {
        return $this->hasMany('App\ProductConfiguration');
    }
}
