<?php

namespace Kavenegar\Laravel;

use Kavenegar\KavenegarApi;
use Illuminate\Support\ServiceProvider;

class KavenegarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(KavenegarChannel::class)
            ->needs(KavenegarApi::class)
            ->give(function () {
                return new KavenegarApi(config('services.kavenegar.key'));
            });
    }
}
