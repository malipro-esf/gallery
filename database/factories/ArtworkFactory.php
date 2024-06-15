<?php

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ArtworkFactory extends Factory
{
    protected $model = Artwork::class;
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
            'sign' => new Sequence('0', '1'),
            'frame' => new Sequence('0', '1'),
            'year_created' => '1999'
        ];
    }
}
