<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Mysql;

use Yoeb\AddressInstaller\Database\Seeders\Mysql\YoebCitySeed;
use Yoeb\AddressInstaller\Database\Seeders\Mysql\YoebCountrySeed;
use Yoeb\AddressInstaller\Database\Seeders\Mysql\YoebStateSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            YoebCountrySeed::class,
            YoebStateSeed::class,
            YoebCitySeed::class,
        ]);
    }
}
