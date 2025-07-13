<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CustomerClub\{
    UserRepositoryInterface,
    PointRepositoryInterface,
    TierRepositoryInterface
};
use App\Repositories\CustomerClub\{
    UserRepository,
    PointRepository,
    TierRepository
};




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            PointRepositoryInterface::class,
            PointRepository::class
        );

        $this->app->bind(
            TierRepositoryInterface::class,
            TierRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191); // برای همه فیلدهای رشته‌ای
    }
}
