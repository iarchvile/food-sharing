<?php


namespace App\Services\ProductsCategories;

use App\Services\ProductsCategories\Repositories\EloquentProductsCategoriesRepository;

class ProductsCategoriesService
{

    const INDEX_PAGE_LIMIT_CATEGORIES = 9;

    /**
     * @var EloquentProductsCategoriesRepository
     */
    private $categoryRepository;

    public function __construct(EloquentProductsCategoriesRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll($perPage = null)
    {
        return $this->categoryRepository->getAll($perPage);
    }

    public function getById(int $id)
    {
        return $this->categoryRepository->getById($id);
    }

}