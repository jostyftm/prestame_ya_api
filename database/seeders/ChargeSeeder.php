<?php

namespace Database\Seeders;

use App\Models\Charge;
use Illuminate\Database\Seeder;

class ChargeSeeder extends Seeder
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $types = [
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
        foreach($this->types as $type){
            Charge::create(['name' => $type]);
        }
    }
}
