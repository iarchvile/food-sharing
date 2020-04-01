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

    /**
     * Получить все карточки продуктов
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->productsCardsRepository->getAll();
    }

    /**
     * Получить карточки определенного статуса
     *
     * @param $statusId
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCardsByStatus($statusId)
    {
        return $this->productsCardsRepository->getCardsByStatus($statusId);
    }

    /**
     * Получить карточки на которые поступили жалобы
     *
     * @return mixed
     */
    public function getComplaintCards()
    {
        return $this->productsCardsRepository->getComplaintCards();
    }

    /**
     * Редактирование карточки продуктов
     *
     * @param $card
     * @param $data
     */
    public function update($card, $data)
    {
        $this->productsCardsRepository->update($card, $data);
    }

    /**
     * @param $data
     *
     * @return int|mixed
     */
    public function create($data)
    {
        return $this->productsCardsRepository->createFormArray($data);
    }
}
