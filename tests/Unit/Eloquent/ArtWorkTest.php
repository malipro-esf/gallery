<?php

namespace Eloquent;

use App\Models\Artwork;
use App\Models\ArtworkTag;
use App\Models\Tag;
use Tests\TestCase;

class ArtWorkTest extends TestCase
{

    public function test_count_tag()
    {
        $artwork = Artwork::create([
            'name_persian' => 'اثر هنری'.rand(100,1000),
            'name_english' => 'artwork'.rand(100,1000),
            'idea_type' => 'original',
            'paint_type' => 'panel',
            'year_created' => '1999'
        ]);

        $tag = Tag::create(['name_persian' => 'تگ تست'.rand(100,1000), 'name_english' => 'test Tag'.rand(100,1000) ]);

        ArtworkTag::create(['artwork_id' => $artwork->id, 'tag_id' => $tag->id]);

        $this->assertEquals(1,  $artwork->countTag());

    }
}
