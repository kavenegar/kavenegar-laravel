<?php
namespace Kavenegar\Laravel;
use Kavenegar\KavenegarApi as KavenegarApi;
class ServiceProviderLaravel5 extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/config.php' => config_path('kavenegar.php')]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'kavenegar');    
        $this->app->singleton('kavenegar', function ($app) {
            return new KavenegarApi($app['config']->get('kavenegar.apikey'));
        });
    }
}
