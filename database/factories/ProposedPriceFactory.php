<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\ProposedPrice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProposedPriceFactory extends Factory
{
    protected $model = ProposedPrice::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'user_id' => User::all()->random()->id,
            'artwork_id' => Artwork::all()->random()->id,
            'price' => rand(1000,100000),
            'description' => $this->faker->text(),
            //
        ];
    }
}
