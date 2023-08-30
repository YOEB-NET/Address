<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = time();
        $i = 0;
        $full = 5080;
        State::truncate();
        $csvData = fopen( __DIR__.'/../data/states.csv', 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $i++;
                if($time+1 < time()){
                    echo ((int) ($i * 100 / $full))."%\n";
                    $time = time();
                }
                State::create([
                    'id' => $data[0],
                    'name' => $data[1],
                    'country_id' => $data[2],
                    'country_code' => $data[3],
                    'country_name' => $data[4],
                    'state_code' => $data[5],
                    'type' => $data[6] ?? null,
                    'latitude' => empty($data[7]) ? null : $data[7],
                    'longitude' => empty($data[8]) ? null : $data[8],
                ]);

            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
