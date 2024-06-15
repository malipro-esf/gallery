<?php

namespace Database\Seeders;

use App\Models\ArtworkStyle;
use Illuminate\Database\Seeder;

class ArtworkStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtworkStyle::factory()->count(5)->create();
    }
}
