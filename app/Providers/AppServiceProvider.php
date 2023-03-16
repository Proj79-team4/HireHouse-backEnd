<?php

namespace App\Providers;

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
    public function boot()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => env("BTREE_MERCHANT_ID"),
            'publicKey' => env("BTREE_PUBLIC_KEY"),
            'privateKey' => env("BTREE_PRIVATE_KEY")
        ]);
    
}
}
