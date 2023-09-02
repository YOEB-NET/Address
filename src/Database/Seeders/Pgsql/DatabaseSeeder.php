<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Pgsql;

use Yoeb\AddressInstaller\Database\Seeders\Pgsql\YoebCitySeed;
use Yoeb\AddressInstaller\Database\Seeders\Pgsql\YoebCountrySeed;
use Yoeb\AddressInstaller\Database\Seeders\Pgsql\YoebStateSeed;
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
