<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Http\Controllers\ApiController;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // $categories = ApiController::getCategories();
        // $subcategories = ApiController::getSubcat();
        // // $brands = PagesController::getBra();

        // View::share([
        //     "categories" => $categories,
        //     "subcategories" => $subcategories,
        //     "brands" => $brands,
        // ]);
    }
}
