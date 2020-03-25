<?php


namespace App\Services\ProductsCards;


use App\Services\ProductsCards\Repositories\EloquentProductsCardsRepository;

class ProductsCardsService
{

    const CATEGORY_PRODUCT_CARD_LIMIT = 15;

    /**
     * @var EloquentProductsCardsRepository
     */
    private $productsCardsRepository;

    public function __construct(EloquentProductsCardsRepository $productsCardsRepository)
    {
        $this->productsCardsRepository = $productsCardsRepository;
    }

    public function getAllByCategoryId($categoryId)
    {
        return $this->productsCardsRepository->getAllByCategoryId($categoryId);
    }

    public function getById(int $id)
    {
        return $this->productsCardsRepository->getById($id);
    }
}