<?php

namespace Tests\Feature\Models;

use App\Models\Artwork;
use App\Models\ArtworkTag;
use App\Models\Comment;
use App\Models\Tag;
use Faker\Provider\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArtWorkTest extends TestCase
{

    use RefreshDatabase,
        ModelHelperTesting;

    protected function model(): Model
    {
        return new Artwork();
    }

    /**
     *
     */

    public function testArtworkRelationWithComment()
    {
        $count = rand(1,10);

        $artwork = Artwork::factory()->hasComments($count)->create();

        $this->assertCount($count, $artwork->comments);

        $this->assertTrue($artwork->comments->first() instanceof Comment);

    }

    public function testArtworkRelationWithTag()
    {
        $count = rand(1,10);

        $artwork = Artwork::factory()->hasTags($count)->create();

        $this->assertCount($count, $artwork->tags);

        $this->assertTrue($artwork->tags->first() instanceof Tag);

    }


}
