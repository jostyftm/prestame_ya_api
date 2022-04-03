<?php

namespace Database\Seeders;

use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){

            Loan::factory()->count(20)->create()
            ->each(function(Loan $loan){
                
                // We get the date the loan was made
                $paidAt = $loan->lend_at;
                $now = \Carbon\Carbon::now();

                do{
                    $paidAt->addMonth();

                    $loan->payments()->save(new Payment([
                        'amount'            =>  $loan->interests,
                        'paid_at'           =>  $paidAt,
                        'payment_type_id'   =>  3
                    ]));
                    
                }while($now->diffInDays($paidAt) >= 28);
            });

        });
    }
}
