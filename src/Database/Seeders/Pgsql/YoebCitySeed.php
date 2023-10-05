<?php

namespace Yoeb\Address\Database\Seeders\Pgsql;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YoebCitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- Cities are added ---------</info>");

        $csvFilePath = __DIR__.'/../../data/csv/cities.csv';
        $query = \sprintf(
            "COPY yoeb_cities (id,name,state_id,state_code,state_name,country_id,country_code,country_name,latitude,longitude,wikiDataid) FROM '%s' DELIMITER ',' CSV HEADER;",
            $csvFilePath
        );
        DB::statement($query);

        $output->writeln("<info>--------- All city added ---------</info>");
    }
}
