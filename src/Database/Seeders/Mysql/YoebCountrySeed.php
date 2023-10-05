<?php

namespace Yoeb\Address\Database\Seeders\Mysql;

use Yoeb\Address\Model\YoebCountry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class YoebCountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>--------- Countries are added ---------</info>");

        Schema::disableForeignKeyConstraints();
        YoebCountry::truncate();
        Schema::enableForeignKeyConstraints();
        DB::unprepared(file_get_contents( __DIR__.'/../../data/mysql/yoeb_countries.sql'));

        $output->writeln("<info>--------- All country added ---------</info>");
    }
}
