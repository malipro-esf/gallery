<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_persian' => 'دسته بندی'.rand(1,1000),
            'name_english' => 'cat'.rand(1,1000),
            'type' => new Sequence('style','technique'),
            'description_persian' => 'توضیحات فارسی'.rand(1,1000),
            'description_english' => $this->faker->text(),
        ];
    }
}
