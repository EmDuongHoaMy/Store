<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public $bindings = [
        'App\Repositories\Interfaces\ProvinceRepositoryInterface'=>'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface'=>'App\Repositories\DistrictRepository',
        'App\Repositories\Interfaces\WardRepositoryInterface'=>'App\Repositories\WardRepository',        'App\Services\Interfaces\PostCatalogueServiceInterface'=>'App\Services\PostCatalogueService',
        'App\Services\Interfaces\UserServiceInterface'=>'App\Services\UserService',
        'App\Services\Interfaces\UserCatalogueServiceInterface'=>'App\Services\UserCatalogueService',
        'App\Services\Interfaces\ProductServiceInterface'=>'App\Services\ProductService',
        'App\Services\Interfaces\ProductCatalogueServiceInterface'=>'App\Services\ProductCatalogueService',
        'App\Services\Interfaces\OrderServiceInterface'=>'App\Services\OrderService',
        'App\Services\Interfaces\AttributeServiceInterface'=>'App\Services\AttributeService',
    ];

    public function register(): void
    {
        foreach ($this->bindings as $key =>$val){
            $this->app->bind($key,$val);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
