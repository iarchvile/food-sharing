<?php

namespace App\Providers;

use App\Services\ProductsCards\Repositories\EloquentProductsCardsRepository;
use App\Services\ProductsCategories\Repositories\ProductsCategoriesInterface;
use App\Services\ProductsCategories\Repositories\EloquentProductsCategoriesRepository;
use App\View\Components\Breadcrumbs;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('breadcrumbs', Breadcrumbs::class);
    }

    private function registerBindings()
    {
        $this->app->bind(ProductsCategoriesInterface::class,
            EloquentProductsCategoriesRepository::class);
        $this->app->bind(ProductsCategoriesInterface::class,
            EloquentProductsCardsRepository::class);
    }
}
