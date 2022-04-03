<?php

namespace Database\Seeders;

use App\Models\Charge;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminUser();

        $this->createEmployees();
    }

    /**
     * Create admin user
     */
    public function createAdminUser()
    {
        User::factory()->create([
            'name'          =>  'joe stwart',
            'last_name'     =>  'valencia renteria',
            'email'         =>  'stiwart94@gmail.com'
        ])->each(function(User $user){
            $user->assignRole('admin');
        });
    }

    /**
     * 
     */
    private function createEmployees()
    {
        DB::transaction(function(){

            $charges = Charge::all()->pluck('id');

            User::factory()->count(2)->create()
            ->each(function(User $user) use($charges) {
                $user->assignRole('employee_seller');
                $user->employee()->save(new Employee([
                    'charge_id' =>  $charges->random(),
                ]));
            });
            
            User::factory()->count(2)->create()
            ->each(function(User $user) use($charges) {
                $user->assignRole('employee_adviser');
                $user->employee()->save(new Employee([
                    'charge_id' =>  $charges->random(),
                ]));
            });
            
            User::factory()->count(2)->create()
            ->each(function(User $user) use($charges) {
                $user->assignRole('employee_collector');
                $user->employee()->save(new Employee([
                    'charge_id' =>  $charges->random(),
                ]));
            });
        });
    }
}
