<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $seeds = [
        'migrate',
        'identifictionType',
        'paymentType',
        'charges',
        'rolesAndPermissions',
        'users',
        'loans'
    ];


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         foreach($this->seeds as $seed) {
            $this->command->line("Processing {$seed}");
            call_user_func([$this, $seed]);
        }
    }

    /**
     * Refresh databases
     */
    public function migrate()
    {
        $this->command->call('migrate:refresh');
        $this->command->line('Migrated tables.');
    }

    /**
     * Seed IdentificationType table
     */
    private function identifictionType()
    {
        $this->call(IdentificationTypeSeeder::class);
    }

    /**
     * Seed PaymentType table
     */
    private function paymentType()
    {
        $this->call(PaymentTypeSeeder::class);
    }

    /**
     * Seed Charge table
     */
    private function charges()
    {
        $this->call(ChargeSeeder::class);
    }

    /**
     * Seed Rol and Permission table
     */
    private function rolesAndPermissions()
    {
        $this->call(RolesAndPermissionSeeder::class);
    }

    /**
     * Seed User employee table
     */
    private function users()
    {
        $this->call(UserSeeder::class);
    }

    /**
     * Seed User Loan table
     */
    private function loans()
    {
        $this->call(LoanSeeder::class);
    }
}
