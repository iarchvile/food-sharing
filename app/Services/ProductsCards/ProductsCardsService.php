<?php


namespace App\Services\ProductsCards;

use App\Services\ProductsCards\Repositories\EloquentProductsCardsRepository;
use App\Helpers\GetDistanceBetweenPoints;
use App\Enums\ProductCardStatusEnum;
use App\Services\ProductsCards\Handlers\StoreImageHandler;
use App\Services\ProductsCards\Handlers\UpdateImageHandler;


class ProductsCardsService
{

    const CATEGORY_PRODUCT_CARD_LIMIT = 15;

    /**
     * @var EloquentProductsCardsRepository
     */
    private $productsCardsRepository;

    /**
     * @var $getDistanceBetweenPointsHandler;
     */
    private $getDistanceBetweenPointsHandler;

    /**
     * @var $storeImageHandler
     */
    private $storeImageHandler;

    /**
     * @var $updateImageHandler
     */
    private $updateImageHandler;

    public function __construct
    (
        EloquentProductsCardsRepository $productsCardsRepository,
        StoreImageHandler $storeImageHandler,
        UpdateImageHandler $updateImageHandler
    )
    {
        $this->productsCardsRepository = $productsCardsRepository;
        $this->storeImageHandler = $storeImageHandler;
        $this->updateImageHandler = $updateImageHandler;
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
     * Получить все карточки рядом с пользователем
     * (если пользователя нет или координаты не заданы - вернуть пустой массив)
     *
     * @param $perPage
     * @return array
     */
    public function getNear(int $perPage) : array
    {
        $response = [];
        $user = \Auth::user();
        if(is_null($user)){
            return $response;
        }
        if(is_null($user->latitude) || is_null($user->longitude)){
            return $response;
        }

        $productCards = $this->getCardsByStatus(ProductCardStatusEnum::ACTIVE)->toArray();

        foreach ($productCards as $key => $productCard){
            $productCards[$key]['distance'] = GetDistanceBetweenPoints::getDistanceBetweenPoints($user->latitude, $user->longitude, $productCard['latitude'], $productCard['longitude']);
        }

        usort($productCards, function ($a, $b) {
            if ($a['distance'] > $b['distance']) {
                return 1;
            }

            if ($a['distance'] < $b['distance']) {
                return -1;
            }

            if ($a['distance'] == $b['distance']) {
                if ($a['created_at'] == $b['created_at']) return 0;
                return ($a['created_at'] > $b['created_at']) ? -1 : 1;
            }
        });

        $response = array_slice($productCards, 0, $perPage);

        return $response;
    }

    /**
     * Редактирование карточки продуктов
     *
     * @param $card
     * @param $data
     * @param $photos
     */
    public function update($card, $data, $photos = null)
    {
        if (!empty($photos)) {

            $data['photos'] = $this->updateImageHandler->handler($card, $photos);
        }

        $this->productsCardsRepository->update($card, $data);
    }

    /**
     * Создать карточку продукта
     *
     * @param $data
     * @param $photos
     * @return int|mixed
     */
    public function create($data, $photos)
    {
        $cardId = $this->productsCardsRepository->createFormArray($data);

        if (!empty($photos)) {
            $this->update($this->getById($cardId), [
                'photos' => $this->storeImageHandler->handler($photos, $cardId)
            ]);
        }

        return $cardId;
    }

    /**
     * Жалоба на карточку продукта
     *
     * @param $id
     * @return int
     */
    public function complaint($id)
    {
       return $this->productsCardsRepository->complaint($id);
    }
}
