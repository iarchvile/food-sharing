<?php

namespace App\Http\Controllers;

use App\Models\ProductCard;
use App\Models\ProductsCategory;
use App\Services\ProductsCards\ProductsCardsService;
use App\Services\ProductsCategories\ProductsCategoriesService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{

    public function index(ProductsCategoriesService $productCategoryService)
    {
        \View::share([
            'categories' => $productCategoryService->getAll($productCategoryService::INDEX_PAGE_LIMIT_CATEGORIES),
        ]);

        return view('pages.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ProductsCategoriesService $productCategoriesService,
        ProductsCardsService $productsCardsService,
        $category)
    {
        \View::share([
            'cards' => $productsCardsService->getAllByCategoryId($category),
            'category' => $productCategoriesService->getById($category),
        ]);

        return view('pages.category');
    }

    public function edit(ProductsCategory $productCategory)
    {
        //
    }

    public function update(Request $request, ProductsCategory $productCategory)
    {
        //
    }

    public function destroy(ProductsCategory $productCategory)
    {
        //
    }
}
