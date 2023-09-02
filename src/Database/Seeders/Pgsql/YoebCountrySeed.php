<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Pgsql;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YoebCountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- Countries are added ---------</info>");

        $csvFilePath = __DIR__.'/../../data/csv/countries.csv';
        $query = \sprintf(
            "COPY yoeb_countries (id,name,iso3,iso2,numeric_code,phonecode,capital,currency,currency_name,currency_symbol,tld,native,region,subregion,nationality,timezones,latitude,longitude,emoji,emojiU) FROM '%s' DELIMITER ',' CSV HEADER;",
            $csvFilePath
        );
        DB::statement($query);

        $output->writeln("<info>--------- All country added ---------</info>");
    }
}
