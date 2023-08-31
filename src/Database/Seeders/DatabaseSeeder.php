<?php

namespace Yoeb\AddressInstaller\Database\Seeders;

use Yoeb\AddressInstaller\Database\Seeders\YoebCitySeed;
use Yoeb\AddressInstaller\Database\Seeders\YoebCountrySeed;
use Yoeb\AddressInstaller\Database\Seeders\YoebStateSeed;
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
