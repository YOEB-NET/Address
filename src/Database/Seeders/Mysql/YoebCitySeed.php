<?php

namespace Yoeb\Address\Database\Seeders\Mysql;

use Yoeb\Address\Model\YoebCity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class YoebCitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- Cities are added ---------</info>");

        Schema::disableForeignKeyConstraints();
        YoebCity::truncate();
        Schema::enableForeignKeyConstraints();
        DB::unprepared(file_get_contents( __DIR__.'/../../data/mysql/yoeb_cities.sql'));

        $output->writeln("<info>--------- All city added ---------</info>");
    }
}
