<?php

namespace App\Domains\Merchant\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class MerchantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerViews();
        // $this->registerFactories();
        // $this->registerSeeds();
        // $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');

    }

    /**
     * Register an additional directory of seeds.
     *
     * @return void
     */
    public function registerSeeds()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/seeds');
        }
    }
}
