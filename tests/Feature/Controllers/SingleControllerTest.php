<?php

namespace Tests\Feature\Controllers;

use App\Models\Artwork;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SingleControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        $artwork = Artwork::factory()->hasComments(rand(0,3))->create();

        $response = $this->get(route('single', $artwork->id));

        $response->assertOk();

        $response->assertViewIs('user_test.single');

        $response->assertViewHasAll([
            'artwork' => $artwork,
            'comments' => $artwork->comments()->latest()->paginate(15)
        ]);
    }

    /**
     *
     */
    public function testCommentMethodWhenUserLoggedIn()
    {
//        $this->withExceptionHandling();

        $user = User::factory()->create();
        $artwork = Artwork::factory()->create();

        $data = Comment::factory()->state([
            'user_fullname' => $user->name,
            'user_id' => $user->id,
            'artwork_id' => $artwork->id,
            'email' => $user->email
        ])->make()->toArray();

        $response = $this->actingAs($user)
            ->withHeaders([
                'HTTP_X-Requested-with' => 'XMLHttpRequest'
            ])
            ->postJson(
            route('single.comment', $artwork->id),
            ['message' => $data['message']]
        );

        $response->assertOk()
        ->assertJson([
            'created' => true
        ]);

        $this->assertDatabaseHas('comments',  $data);
    }

    public function testCommentMethodValidRequiredData()
    {
//        $this->withExceptionHandling();

        $user = User::factory()->create();
        $artwork = Artwork::factory()->create();


        $response = $this->actingAs($user)
            ->withHeaders([
                'HTTP_X-Requested-with' => 'XMLHttpRequest'
            ])
            ->postJson(
                route('single.comment', $artwork->id),
                ['message' => '']
            );

        $response->assertJsonValidationErrors([
            'message' => 'فیلد message الزامی است'
        ]);
    }

//    public function testCommentMethodWhenUserNotLoggedIn() // use it for add to favorite
//    {
////        $this->withExceptionHandling();
//
//        $user = User::factory()->create();
//        $artwork = Artwork::factory()->create();
//
//        $data = Comment::factory()->state([
//            'user_fullname' => $user->name,
//            'user_id' => $user->id,
//            'artwork_id' => $artwork->id,
//            'email' => $user->email
//        ])->make()->toArray();
//
//        $response = $this->actingAs($user)
//            ->post(
//                route('single.comment', $artwork->id),
//                ['message' => $data['message']]
//            );
//
//        $response->assertRedirect(route('single', $artwork->id));
//
//        $this->assertDatabaseHas('comments',  $data);
//    }
        // episode 11

   }
