<?php
namespace Yoeb\Address;

use Illuminate\Support\ServiceProvider;
use Yoeb\Address\Console\YoebSeed;


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
