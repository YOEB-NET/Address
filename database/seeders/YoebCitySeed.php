<?php

namespace Database\Seeders;

use Yoeb\AddressInstaller\Model\YoebCity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YoebCitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = time();
        $i = 0;
        $full = 150541;
        YoebCity::truncate();
        $csvData = fopen( __DIR__.'/../data/cities.csv', 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $i++;
                if($time+5 < time()){
                    echo ((int) ($i * 100 / $full))."%\n";
                    $time = time();
                }
                YoebCity::create([
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
                    'wikiDataId' => $data[10],
                ]);

            }
            $transRow = false;
        }
        fclose($csvData);

    }
}
