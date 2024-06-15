<?php

namespace Tests\Feature\Models;

use App\Models\Artwork;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase,
        ModelHelperTesting;

    protected function model(): Model
    {
        return new Tag();
    }

    public function testTagRelationshipWithArtwork()
    {
        $count = rand(1,10);

        $tag = Tag::factory()->hasArtworks($count)->create();

        $this->assertCount($count, $tag->artworks);

        $this->assertTrue($tag->artworks->first() instanceof Artwork);

    }
}
