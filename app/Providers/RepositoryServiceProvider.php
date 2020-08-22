<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repository\Interfaces\EloquentRepositoryInterface::class, \App\Repository\Eloquent\BaseRepository::class);
        $this->app->bind(\App\Repository\Interfaces\CategoryRepositoryInterface::class, \App\Repository\Eloquent\CategoryRepository::class);
        $this->app->bind(\App\Repository\Interfaces\ProductCategoryRepositoryInterface::class, \App\Repository\Eloquent\ProductCategoryRepository::class);
        $this->app->bind(\App\Repository\Interfaces\ProductRepositoryInterface::class, \App\Repository\Eloquent\ProductRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
