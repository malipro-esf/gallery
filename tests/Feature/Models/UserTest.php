<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase,
        ModelHelperTesting;

    protected function model(): Model
    {
        return new User();
    }


    public function testUserRelationshipWithComment()
    {
        $count = rand(1,10);

        $user = User::factory()->hasComments($count)->create();

        $this->assertCount($count, $user->comments);

        $this->assertTrue($user->comments->first() instanceof Comment);
    }
}
