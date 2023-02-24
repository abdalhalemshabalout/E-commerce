<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            1=>[
                'role_name'=>'Admin',
            ],
            2=>[
                'role_name'=>'Employee',
            ],
            3=>[
                'role_name'=>'Customer',
            ],
        ]);
    }
}
