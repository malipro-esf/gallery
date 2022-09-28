<?php

namespace Eloquent;

use App\Models\Artwork;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_fetches_most_favorite_artwork()
    {
        for ($i = 0; $i < 4; ++$i) {
            Favorite::create([
                'artwork_id' => 9,
                'user_id' => rand(11,100),
            ]);
        }

        $mostFavoriteId = Favorite::trending();

        $this->assertEquals(9,$mostFavoriteId);

    }

    /**
     *
     */

    public function test_a_user_can_add_to_favorite()
    {
        $artwork = Artwork::create([
            'name_persian' => 'اثر هنری'.rand(100,1000),
            'name_english' => 'artwork'.rand(100,1000),
            'idea_type' => 'original',
            'paint_type' => 'panel',
            'year_created' => '1999'
        ]);

        $user = User::create([
            'name' => 'user'.rand(1000,99999),
            'mobile' => rand(12345678,1234756789),
            'confirmation_code'=> rand(10000,99999),
            'type' => 'user',
            'confirmation_status' => '1',
            'email' => rand(1,10000).'@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $this->actingAs($user);

        $favorite = Favorite::create(['artwork_id' => $artwork->id, 'user_id' => $user->id]);

        $this->assertDatabaseHas('favorites',[
            'user_id' => $user->id,
            'artwork_id' => $artwork->id
        ]);

        $this->assertTrue($artwork->checkAddToFavorite());
    }

    public function test_a_user_can_remove_favorite()
    {
        $artwork = Artwork::create([
            'name_persian' => 'اثر هنری'.rand(100,1000),
            'name_english' => 'artwork'.rand(100,1000),
            'idea_type' => 'original',
            'paint_type' => 'panel',
            'year_created' => '1999'
        ]);

        $user = User::create([
            'name' => 'user'.rand(1000,99999),
            'mobile' => rand(12345678,1234756789),
            'confirmation_code'=> rand(10000,99999),
            'type' => 'user',
            'confirmation_status' => '1',
            'email' => rand(1,10000).'@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $this->actingAs($user);

        $favorite = Favorite::create(['artwork_id' => $artwork->id, 'user_id' => $user->id]);

        $favorite->remove();

        $this->assertDatabaseMissing('favorites', [
        'user_id' => $user->id,
            'artwork_id' => $artwork->id
        ]);

        $this->assertFalse($artwork->checkAddToFavorite());
    }


}
