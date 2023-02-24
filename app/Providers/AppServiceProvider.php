<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'vds2ynk46pksp57g',
                    'publicKey' => 'hnrq7sk8sttcgbgp',
                    'privateKey' => '835ceb733cd06bb3639292b24c6241d8'
                ]
            );
        });
    }
}
