<?php

namespace Zenapply\Sms\Providers;

use Zenapply\Sms\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register() {
        $this->mergeConfigFrom(__DIR__ . '/../../config/sms.php', 'sms');

        $this->app->singleton('sms', function() {
            return new Sms;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/sms.php' => base_path('config/sms.php'),
        ]);   
    }
}