<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        $date = '2020-10-30 19:13:32';

        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => Hash::make('admin'),
            'remember_token' => null,
            'created_at'     => $date,
            'updated_at'     => $date,
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
