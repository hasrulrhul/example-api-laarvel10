<?php

namespace App\Providers;

use App\Http\Services\Repositories\BaseRepository;
use App\Http\Services\Repositories\Contracts\BaseRepositoryInterface;
use App\Http\Services\Repositories\Contracts\UserContract;
use App\Http\Services\Repositories\UserRepository;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserContract::class, UserRepository::class);
    }
}
