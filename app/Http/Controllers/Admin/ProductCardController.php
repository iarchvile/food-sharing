<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCardStatus;
use App\Models\ProductCard;
use App\Services\ProductsCards\ProductsCardsService;
use App\Services\ProductsCategories\ProductsCategoriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\ProductCardStatusEnum;

class ProductCardController extends Controller
{
    /**
     * @var ProductsCardsService
     */
    private $productsCardsService;

    /**
     * @var ProductsCategoriesService
     */
    private $productsCategoriesService;

    /**
     * ProductCardController constructor.
     * @param ProductsCardsService $productsCardsService
     * @param ProductsCategoriesService $productsCategoriesService
     */
    public function __construct
    (
        ProductsCardsService $productsCardsService,
        ProductsCategoriesService $productsCategoriesService
    )
    {
        $this->productsCardsService = $productsCardsService;
        $this->productsCategoriesService = $productsCategoriesService;
        $this->middleware('auth');
    }

    /**
     * Получить все карточки продуктов
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index', [
            'productCards' => $this->productsCardsService->getAll(),
        ]);
    }

    /**
     * Получить новые карточки
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNewCards()
    {
        return view('admin.index', [
            'productCards' => $this->productsCardsService->getCardsByStatus(ProductCardStatusEnum::AWAITING_MODERATION),
        ]);
    }

    /**
     * Получить карточки на которые пожаловались
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getComplaintCards()
    {
        return view('admin.index', [
            'productCards' => $this->productsCardsService->getComplaintCards(),
        ]);
    }

    /**
     * Получить карточку продукты для редактирования
     *
     * @param ProductCard $card
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ProductCard $card)
    {
        return view('admin.productCard.edit', [
            'productCard' => $this->productsCardsService->getById($card->id),
            'productsCategories' => $this->productsCategoriesService->getAll(),
            'productCardsStatuses' => ProductCardStatus::all()
        ]);
    }

    /**
     * Редактирование карточки продуктов
     *
     * @param Request $request
     * @param ProductCard $card
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ProductCard $card)
    {
        $request->validate([
            'products_category_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);

        $this->productsCardsService->update($card, [
            'products_category_id' => $request->get('products_category_id'),
            'status_id' => $request->get('status_id'),
            'is_сomplaint' => !empty($request->get('is_сomplaint')) ? 1 : 0,
        ]);

        return redirect()->route('admin');
    }

    /**
     * Количество карточек
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCardsCount()
    {
        return response()->json([
            'new' => count($this->productsCardsService->getCardsByStatus(ProductCardStatusEnum::AWAITING_MODERATION)), //карточки требующие модерации
            'complaint' => count($this->productsCardsService->getComplaintCards()) //карточки на которые поступили жалобы
        ]);
    }
}
