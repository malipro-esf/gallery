<?php

namespace Tests\Feature\Models;

use App\Models\Artwork;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase,
        ModelHelperTesting;

    protected function model(): Model
    {
        return new Comment();
    }


    public function testCommentRelationWithArtwork()
    {
        $comment = Comment::factory()->for(Artwork::factory())->create();

        $this->assertTrue(isset($comment->artwork->id));

        $this->assertTrue($comment->artwork instanceof Artwork);

    }

    public function testCommentRelationshipWithUser()
    {
        $comment = Comment::factory()->for(User::factory())->create();

        $this->assertTrue(isset($comment->user->id));

        $this->assertTrue($comment->user instanceof User);

    }
}
