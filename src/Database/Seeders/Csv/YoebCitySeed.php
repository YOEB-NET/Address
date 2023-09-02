<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Csv;

use Yoeb\AddressInstaller\Model\YoebCity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class YoebCitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- Cities are added ---------</info>");

        $time = time();
        $i = 0;
        $full = 150541;
        YoebCity::truncate();
        $csvData = fopen( __DIR__.'/../../data/csv/cities.csv', 'r');
        $transRow = true;
        $datas = [];
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $i++;
                if($time+5 < time()){
                    $output->writeln("<info>".((int) ($i * 100 / $full))."% added"."</info>");
                    $time = time();
                }
                $datas[] = [
                    'id' => $data[0],
                    'name' => $data[1],
                    'state_id' => $data[2],
                    'state_code' => $data[3],
                    'state_name' => $data[4],
                    'country_id' => $data[5],
                    'country_code' => $data[6],
                    'country_name' => $data[7],
                    'latitude' => empty($data[8]) ? null : $data[8],
                    'longitude' => empty($data[9]) ? null : $data[9],
                    'wikidataid' => $data[10],
                ];

            }
            $transRow = false;
        }
        fclose($csvData);
        YoebCity::insert($datas);
        $output->writeln("<info>--------- All city added ---------</info>");
    }
}
