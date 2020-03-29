<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCardStatus extends Model
{
    public function productCard()
    {
        return $this->belongsTo('App\Models\ProductCard', 'status_id', 'id');
    }
}
