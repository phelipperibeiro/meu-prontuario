<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $date = '2020-10-30 19:13:32';
        $permissions = [
            [
                'id' => '1',
                'title' => 'user_management_access',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '2',
                'title' => 'permission_create',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '3',
                'title' => 'permission_edit',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '4',
                'title' => 'permission_show',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '5',
                'title' => 'permission_delete',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '6',
                'title' => 'permission_access',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '7',
                'title' => 'role_create',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '8',
                'title' => 'role_edit',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '9',
                'title' => 'role_show',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '10',
                'title' => 'role_delete',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '11',
                'title' => 'role_access',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '12',
                'title' => 'user_create',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '13',
                'title' => 'user_edit',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '14',
                'title' => 'user_show',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '15',
                'title' => 'user_delete',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '16',
                'title' => 'user_access',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '17',
                'title' => 'patient_create',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '18',
                'title' => 'patient_edit',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '19',
                'title' => 'patient_show',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '20',
                'title' => 'patient_delete',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => '21',
                'title' => 'patient_access',
                'created_at' => $date,
                'updated_at' => $date,
            ]];

        Permission::insert($permissions);
    }
}
