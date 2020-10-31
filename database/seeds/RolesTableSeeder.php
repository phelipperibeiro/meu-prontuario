<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $date = '2020-10-30 19:13:32';
        $roles = [[
            'id'         => 1,
            'title'      => 'Admin',
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => null,
        ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => null,
            ]];

        Role::insert($roles);
    }
}
