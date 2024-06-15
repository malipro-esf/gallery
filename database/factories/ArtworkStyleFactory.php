<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkStyleFactory extends Factory
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
            'style_id' => Category::where('type','style')->get()->random()->id,
        ];
    }
}
