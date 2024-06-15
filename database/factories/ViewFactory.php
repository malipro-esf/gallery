<?php

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Arr;

class ViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artwork_id' => Artwork::all()->random()->id,
            'ip_address' => $this->faker->ipv4(),
            'agent_system' => new Sequence('android','ios'),
        ];
    }
}
