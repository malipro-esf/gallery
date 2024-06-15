<?php

namespace Tests\Feature\Views;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeViewRenderWhenUserIsAdmin()
    {
        $user = User::factory()->state(['type' => 'admin'])->create();
        $this->actingAs($user);

        $view = $this->view('home');

        $view->assertSee('<a href="#">Just for admin!</a>', false);

    }

    public function testHomeViewRenderWhenUserIsNotAdmin()
    {
        $user = User::factory()->state(['type' => 'user'])->create();
        $this->actingAs($user);

        $view = $this->view('home');

        $view->assertDontSee('<a href="#">Just for admin!</a>', false);

    }
}
