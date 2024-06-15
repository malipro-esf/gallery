<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'address_id' => Address::all()->random()->id,
            'bill_number' => rand(1,1000),
            'post_cost' => rand(10000,999999),
            'tax_cost' => rand(10000,999999),
            'total_price' => rand(10000,999999),
            'tracking_code' => rand(10000,999999),
        ];
    }
}
