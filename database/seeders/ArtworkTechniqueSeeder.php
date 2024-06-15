<?php

namespace Database\Seeders;

use App\Models\ArtworkTechnique;
use Illuminate\Database\Seeder;

class ArtworkTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtworkTechnique::factory()->count(5)->create();
    }
}
