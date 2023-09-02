<?php

namespace Yoeb\AddressInstaller\Database\Seeders\Mysql;

use Yoeb\AddressInstaller\Model\YoebState;
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

        YoebState::truncate();
        DB::unprepared(file_get_contents( __DIR__.'/../../data/mysql/yoeb_states.sql'));

        $output->writeln("<info>--------- All state added ---------</info>");
    }
}
