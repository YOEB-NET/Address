<?php

namespace Yoeb\AddressInstaller\Console;

use Illuminate\Console\Command;
use Yoeb\AddressInstaller\Database\Seeders\DatabaseSeeder;

class YoebSeed extends Command
{
    protected $signature = 'yoeb:address-seed';


    public function handle()
    {
        $this->call(DatabaseSeeder::class);
        $this->info('Addresses added!');
    }
}
