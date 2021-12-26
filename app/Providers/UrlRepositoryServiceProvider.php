<?php

namespace App\Providers;

use App\Domain\UrlRepositoryInterface;
use App\Repositories\UrlRepository;
use Illuminate\Support\ServiceProvider;

class UrlRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UrlRepositoryInterface::class, UrlRepository::class);
    }
}
