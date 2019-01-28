<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperType extends Model
{
    protected $fillable = ['type'];

    public function product_configurations()
    {
        return $this->hasMany('App\ProductConfiguration');
    }
}
