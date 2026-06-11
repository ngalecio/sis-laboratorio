<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Código de emergencia para Easypanel: Crea las carpetas si Linux no las encuentra
        if (!file_exists(resource_path('views'))) {
            mkdir(resource_path('views'), 0755, true);
        }
        if (!file_exists(storage_path('framework/views'))) {
            mkdir(storage_path('framework/views'), 0755, true);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
