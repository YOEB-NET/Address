<?php

namespace Yoeb\Address\Console;

use Illuminate\Console\Command;
use Yoeb\Address\Database\Seeders\Csv\DatabaseSeeder as CsvDatabaseSeeder;
use Yoeb\Address\Database\Seeders\Mysql\DatabaseSeeder as MysqlDatabaseSeeder;
use Yoeb\Address\Database\Seeders\Pgsql\DatabaseSeeder as PgsqlDatabaseSeeder;

class YoebSeed extends Command
{
    protected $signature = 'yoeb:address-seed {--csv}';


    public function handle()
    {
        $dbConnection = env("DB_CONNECTION", "");
        if ($this->option('csv')) {
            $this->call(CsvDatabaseSeeder::class);
            $this->info('Addresses added from CSV!');
        }else if($dbConnection == "mysql"){
            $this->call(MysqlDatabaseSeeder::class);
            $this->info('Addresses added!');
        }else if($dbConnection == "pgsql"){
            $this->call(PgsqlDatabaseSeeder::class);
            $this->info('Addresses added!');
        }else{
            $this->call(CsvDatabaseSeeder::class);
            $this->info('Addresses added!');
        }
    }
}
