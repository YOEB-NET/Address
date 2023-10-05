<?php

namespace Yoeb\Address\Database\Seeders\Csv;

use Yoeb\Address\Database\Seeders\Csv\YoebCitySeed;
use Yoeb\Address\Database\Seeders\Csv\YoebCountrySeed;
use Yoeb\Address\Database\Seeders\Csv\YoebStateSeed;
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
