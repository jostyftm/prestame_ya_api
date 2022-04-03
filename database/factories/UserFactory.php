<?php

namespace Database\Factories;

use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $documentType = DocumentType::all()->pluck('id')->random();

        return [
            'name'              => $this->faker->name(),
            'last_name'         => $this->faker->name(),
            'document_type_id'  =>  $documentType,
            'document_number'   =>  $this->faker->randomNumber(6),
            'address'           =>  $this->faker->address(),
            'phone'             =>  $this->faker->phoneNumber(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
