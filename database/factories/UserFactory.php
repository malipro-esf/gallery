<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'mobile' => $this->faker->numerify('###########'),
            'confirmation_code'=> $this->faker->randomNumber(5),
            'type' => Arr::random(['admin', 'user']),
            'confirmation_status' => '1',
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$vAUDmkFQZqUdVmu./PtuGujgoybkTFHj4Q6v2x4W.Mj.jxe.R8dPK', // password
        ];
    }

    /**
     * Indicate that the model's type should be user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'user',
            ];
        });
    }

    /**
     * Indicate that the model's type should be admin.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'admin',
            ];
        });
    }
}
