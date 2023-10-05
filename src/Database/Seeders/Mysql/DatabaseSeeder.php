<?php

namespace Yoeb\Address\Database\Seeders\Mysql;

use Yoeb\Address\Database\Seeders\Mysql\YoebCitySeed;
use Yoeb\Address\Database\Seeders\Mysql\YoebCountrySeed;
use Yoeb\Address\Database\Seeders\Mysql\YoebStateSeed;
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
