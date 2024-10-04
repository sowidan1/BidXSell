<?php

namespace App\Providers;

use App\Services\ETS\EventService;
use App\Services\PS\CaesarCipherService;
use App\Services\PS\JsonFlattenerService;
use App\Services\PS\NumberToExcelService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $services = [
            'NumberToExcelService'   => NumberToExcelService::class,
            'CaesarCipherService'    => CaesarCipherService::class,
            'JsonFlattenerService'   => JsonFlattenerService::class,
            'EventService'           => EventService::class
        ];

        foreach ($services as $key => $service) {
            $this->app->singleton($key, function () use ($service) {
                return new $service();
            });
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
