<?php

namespace App\Http\Controllers;

use App\Models\ProductCard;
use App\Services\ProductsCards\ProductsCardsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductsCardsService  $productsCardsService
     * @param $card
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
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
}
