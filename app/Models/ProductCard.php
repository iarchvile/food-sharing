<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCard
 *
 * @property int $id
 * @property int $user_id
 * @property int $products_category_id
 * @property string $title
 * @property string|null $description
 * @property string|null $geo_data
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductsCategory $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereGeoData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereProductsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCard whereUserId($value)
 * @mixin \Eloquent
 */
class ProductCard extends Model
{

    protected $casts = [
        'photos' => 'array',
        'created_at' => 'data',
    ];

    public function category()
    {
        return $this->hasOne(ProductsCategory::class, 'id', 'products_category_id');
    }

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
