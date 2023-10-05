<?php

namespace Yoeb\Address\Database\Seeders\Csv;

use Yoeb\Address\Model\YoebState;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class YoebStateSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- States are added ---------</info>");
        $time = time();
        $i = 0;
        $full = 5080;
        YoebState::truncate();
        $csvData = fopen( __DIR__.'/../../data/csv/states.csv', 'r');
        $transRow = true;
        $datas = [];
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                $i++;
                if($time+1 < time()){
                    $output->writeln("<info>".((int) ($i * 100 / $full))."% added"."</info>");
                    $time = time();
                }
                $datas[] = [
                    'id' => $data[0],
                    'name' => $data[1],
                    'country_id' => $data[2],
                    'country_code' => $data[3],
                    'country_name' => $data[4],
                    'state_code' => $data[5],
                    'type' => $data[6] ?? null,
                    'latitude' => empty($data[7]) ? null : $data[7],
                    'longitude' => empty($data[8]) ? null : $data[8],
                ];

            }
            $transRow = false;
        }
        YoebState::insert($datas);
        $output->writeln("<info>--------- All state added ---------</info>");

        fclose($csvData);
    }
}
