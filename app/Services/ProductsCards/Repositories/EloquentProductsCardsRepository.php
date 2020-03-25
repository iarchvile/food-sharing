<?php


namespace App\Services\ProductsCards\Repositories;

use App\Models\ProductCard;
use App\Models\ProductsCategory;
use App\Services\ProductsCards\ProductsCardsService;

class EloquentProductsCardsRepository
{
    /**
     * @var ProductsCategory
     */
    private $productsCategory;

    public function __construct(ProductsCategory $productsCategory)
    {
        $this->productsCategory = $productsCategory;
    }

    public function getAllByCategoryId($categoryId)
    {
        return ProductCard::whereProductsCategoryId($categoryId)
            ->paginate(ProductsCardsService::CATEGORY_PRODUCT_CARD_LIMIT);
    }

    public function getById(int $id)
    {
        return ProductCard::findOrFail($id);
    }
}