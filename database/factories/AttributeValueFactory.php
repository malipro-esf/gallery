<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attribute_id' => Attribute::all()->random()->id,
            'value_persian' => 'مقدار'.rand(1,1000),
            'value_english' => 'value'.rand(1,1000),

        ];
    }
}
