<?php

namespace App\Services\ProductsCategories\Repositories;

use App\Models\ProductsCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentProductsCategoriesRepository implements ProductsCategoriesInterface
{

    /**
     * @inheritDoc
     */
    public function getAll($perPage = null) :LengthAwarePaginator
    {
        return ProductsCategory::paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id)
    {
        return ProductsCategory::findOrFail($id);
    }

}
