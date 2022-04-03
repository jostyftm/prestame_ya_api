<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $roles = [
        'admin',
        'employee_seller',
        'employee_adviser',
        'employee_collector',
        'client'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->roles as $rol){
            Role::create(['name' => $rol]);
        }
    }
}
