<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_persian' => 'خصوصیت'.rand(1,100),
            'name_english' => 'attribute'.rand(1,100),
            'filterable' => new Sequence('0','1')
        ];
    }
}
