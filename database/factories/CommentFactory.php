<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artwork_id' => Artwork::factory(),
//            'user_id' => User::all()->random()->id,
            'user_id' => User::factory(),
            'user_fullname' => $this->faker->name(),
            'email' => $this->faker->email(),
            'message' => $this->faker->text(),
            'verification_status' => new Sequence('0','1'),
        ];
    }
}
