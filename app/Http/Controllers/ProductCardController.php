<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\StoreProductCardRequest;
use App\Models\ProductCard;
use App\Models\ProductsCategory;
use App\Services\ProductsCards\ProductsCardsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductCardController extends Controller
{

    public function index()
    {
        //
    }

    public function create(ProductsCategory $productsCategory)
    {
        \View::share([
            'categories' => $productsCategory::all(['id', 'title'])->
            pluck('title', 'id')->toArray(),
        ]);

        return view('pages.card-detail');
    }

    public function store(StoreProductCardRequest $request)
    {
        $data = $request->getFormData();
        dd($data);

        $this->citiesService->createCity($data);

        return redirect(route('cms.cities.index'));
    }

    public function show(ProductsCardsService $productsCardsService, $card)
    {
        \View::share([
            'card' => $productsCardsService->getById($card),
        ]);

        return view('pages.card-detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductCard  $productCard
     *
     * @return Response
     */
    public function edit(ProductCard $productCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  ProductCard  $productCard
     *
     * @return Response
     */
    public function update(Request $request, ProductCard $productCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductCard  $productCard
     *
     * @return Response
     */
    public function destroy(ProductCard $productCard)
    {
        //
    }

    /**
     * Жалоба на карточку продукта
     *
     * @param ProductsCardsService $productsCardsService
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function complaint(ProductsCardsService $productsCardsService,$id)
    {
        return response()->json($productsCardsService->complaint($id), 200);
    }
}
