<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Csv;

use Yoeb\AddressInstaller\Database\Seeders\Csv\YoebCitySeed;
use Yoeb\AddressInstaller\Database\Seeders\Csv\YoebCountrySeed;
use Yoeb\AddressInstaller\Database\Seeders\Csv\YoebStateSeed;
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
