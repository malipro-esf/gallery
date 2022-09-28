<?php

namespace Simple;

use App\Models\Artwork;
use App\Models\ArtworkTag;
use App\Models\Tag;
use Tests\TestCase;

class ArtWorkTest extends TestCase
{
    /**
     * @var Artwork
     */
    private $artwork;

    public function setUp():void
    {
        $this->artwork = new Artwork('artworkName1', 100000);
    }
    /**
     *
     */
    public function test_an_artwork_has_a_persian_name()
    {

        $this->assertEquals('artworkName1', $this->artwork->persianName());
    }

    /**
     *
     */

    public function test_an_artwork_has_a_price_rials()
    {
        $this->assertEquals(100000, $this->artwork->rialsPrice());
    }

    /**
     *
     */
    public function test_an_artwork_can_add_tag()
    {
        $artwork = Artwork::create([
            'name_persian' => 'اثر هنری'.rand(100,1000),
            'name_english' => 'artwork'.rand(100,1000),
            'idea_type' => 'original',
            'paint_type' => 'panel',
            'year_created' => '1999'
        ]);

        $tag = Tag::create(['name_persian' => 'تگ تست', 'name_english' => 'test Tag' ]);

       $artwork->addTag($tag);

       $this->assertEquals(1,  $this->artwork->countTag());
    }
}
