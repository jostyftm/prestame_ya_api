<?php

namespace Database\Factories;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount = $this->faker->numberBetween(100000, 5000000);
        $interests = ($amount * 0.2);
        $paid_at = Carbon::now()->subMonths(random_int(1, 7));

        return [
            'client_id' =>  Client::factory()->create(),
            'amount'    =>  $amount,
            'interests' =>  $interests,
            'lend_at'   =>  $paid_at
        ];
    }
}
