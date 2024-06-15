<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bill_id' => Bill::all()->random()->id,
            'artwork_id' => Artwork::all()->random()->id,
        ];
    }
}
