<?php

namespace Database\Factories;

use App\Models\ArtworkTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkTagFactory extends Factory
{
    protected $model = ArtworkTag::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artwork_id' => ArtworkTag::factory(),
            'tag_id' => Tag::factory()
        ];
    }
}
