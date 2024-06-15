<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\ArtworkTechnique;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkTechniqueFactory extends Factory
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
            'technique_id' => ArtworkTechnique::all()->random()->id
        ];
    }
}
