<?php
namespace Yoeb\AddressInstaller;


use Illuminate\Support\ServiceProvider;
use Yoeb\AddressInstaller\Database\Seeders\DatabaseSeeder;

class YoebServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $seed = new DatabaseSeeder();
        $seed->run();
    }

}



?>
