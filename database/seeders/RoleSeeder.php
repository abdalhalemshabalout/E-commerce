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
                'roles_name'=>'Admin',
            ],
            2=>[
                'roles_name'=>'Employee',
            ],
            3=>[
                'roles_name'=>'Customer',
            ],
        ]);
    }
}
