<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCardStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductCard $productCard
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCardStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCardStatus extends Model
{
    public function productCard()
    {
        return $this->belongsTo('App\Models\ProductCard', 'status_id', 'id');
    }
}
