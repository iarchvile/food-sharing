<?php

namespace App\Models;

/**
 * App\Models\ProductsCategory
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductCard[] $cards
 * @property-read int|null $cards_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $photo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductsCategory wherePhoto($value)
 */
class ProductsCategory extends BaseModel
{
    public function cards()
    {
        return $this->hasMany(ProductCard::class);
    }
}
