<?php


namespace App\Services\ProductsCategories\Handlers;

use App\Services\ProductsCategories\Repositories\EloquentProductsCategoriesRepository;

class GetCategoriesHandler
{
    /**
     * @var EloquentProductsCategoriesRepository
     */
    private $categoriesRepository;

    public function __construct(EloquentProductsCategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function handle(array $data): array
    {
        return $this->categoriesRepository->createFromArray($data);
    }
}