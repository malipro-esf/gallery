<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkAttributeFactory extends Factory
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
            'attributevalue_id' => AttributeValue::all()->random()->id,
        ];
    }
}
