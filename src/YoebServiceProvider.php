<?php
namespace Yoeb\AddressInstaller;

use Illuminate\Support\ServiceProvider;
use Yoeb\AddressInstaller\Console\YoebSeed;


class YoebServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');


        if ($this->app->runningInConsole()) {
            $this->commands([
                YoebSeed::class,
            ]);
        }
    }

}



?>
