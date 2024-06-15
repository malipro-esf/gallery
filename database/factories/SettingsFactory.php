<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_persian' => 'درباره ما',
            'title_english' => 'َAbout us',
            'text_english' => $this->faker->text(),
            'text_persian' => 'متن تستی متن تستی متن تستی متن تستی متن تستی متن تستی متن تستی متن تستی',
        ];
    }
}
