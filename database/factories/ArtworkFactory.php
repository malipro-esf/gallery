<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_persian' => 'اثر هنری'.rand(100,1000),
            'name_english' => 'artwork'.rand(100,1000),
            'idea_type' => 'original',
            'paint_type' => 'panel',
            'year_created' => '1999'
        ];
    }
}
