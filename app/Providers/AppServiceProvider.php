<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\AliasLoader;
use Mcire\PayTech\PayTechServiceProvider;
use Mcire\PayTech\Facades\PayTech;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
         // Enregistre le fournisseur de service PayTech
    $this->app->register(PayTechServiceProvider::class);

    $loader = AliasLoader::getInstance();
    $loader->alias('PayTech', PayTech::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
