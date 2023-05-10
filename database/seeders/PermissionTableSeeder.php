<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Roles','Roles Show','Roles Create','Roles Edit','Roles Delete',
            'Users', 'Users Show', 'Users Create','Users Edit','Users Delete',
            'VPs', 'VPs Show', 'VPs Create','VPs Edit','VPs Delete',
            'Areas', 'Areas Show', 'Areas Create','Areas Edit','Areas Delete',
            'Employees', 'Employees Show', 'Employees Create','Employees Edit','Employees Delete',
            'Requests', 'Requests Approve', 'Requests Print',
             'Requests Show', 'Requests Create','Requests Edit','Requests Delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
