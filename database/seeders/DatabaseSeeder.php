<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ini_set('memory_limit', '-1');

        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RoleSeeder::class);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');    }
}
