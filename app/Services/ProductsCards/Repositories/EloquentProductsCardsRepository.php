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
        return ProductCard::with('category', 'status')->findOrFail($id);
    }

    /**
     * Получить все карточки продуктов
     *
     * @return ProductCard[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return ProductCard::with('category', 'status')->get();
    }

    /**
     * Получить карточки определенного статуса
     *
     * @param $statusId
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCardsByStatus($statusId)
    {
        return ProductCard::where('status_id', $statusId)->with('category', 'status')->get();
    }

    /**
     * Получить карточки на которые поступили жалобы
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getComplaintCards()
    {
        return ProductCard::where('is_сomplaint', 1)->with('category', 'status')->get();
    }

    /**
     * Редактирование карточки продуктов
     *
     * @param ProductCard $card
     * @param $data
     */
    public function update(ProductCard $card, $data)
    {
        $card->update($data);
    }

    /**
     * @param $data
     *
     * @return int|mixed
     */
    public function createFormArray($data)
    {
        return (new ProductCard())->create($data)->id;
    }

    /**
     * Жалоба на карточку продукта
     *
     * @param $id
     * @return int
     */
    public function complaint($id)
    {
       return ProductCard::where('id', $id)->update([
           'is_сomplaint' => 1
       ]);
    }
}
