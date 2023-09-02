<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Pgsql;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YoebStateSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- States are added ---------</info>");

        $csvFilePath = __DIR__.'/../../data/csv/states.csv';
        $query = \sprintf(
            "COPY yoeb_states (id,name,country_id,country_code,country_name,state_code,type,latitude,longitude) FROM '%s' DELIMITER ',' CSV HEADER;",
            $csvFilePath
        );
        DB::statement($query);

        $output->writeln("<info>--------- All state added ---------</info>");
    }
}
