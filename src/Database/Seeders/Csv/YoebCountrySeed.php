<?php

namespace Yoeb\Address\Database\Seeders\Csv;

use Yoeb\Address\Model\YoebCountry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        YoebCountry::truncate();
        $csvData = fopen( __DIR__.'/../../data/csv/countries.csv', 'r');
        $transRow = true;
        $datas = [];
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $datas[] = [
                    "id"              => $data[0],
                    "name"            => $data[1],
                    "iso3"            => $data[2],
                    "iso2"            => $data[3],
                    "numeric_code"    => $data[4],
                    "phonecode"       => $data[5],
                    "capital"         => $data[6],
                    "currency"        => $data[7],
                    "currency_name"   => $data[8],
                    "currency_symbol" => $data[9],
                    "tld"             => $data[10],
                    "native"          => $data[11],
                    "region"          => $data[12],
                    "subregion"       => $data[13],
                    "nationality"     => $data[14],
                    "timezones"       => $data[15],
                    "latitude"        => $data[16],
                    "longitude"       => $data[17],
                    "emoji"           => $data[18],
                    "emojiu"          => $data[19],
                ];
            }
            $transRow = false;
        }
        fclose($csvData);

        DB::table('yoeb_countries')->insert($datas);


        $output->writeln("<info>--------- All country added ---------</info>");

    }
}
