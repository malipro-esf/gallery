<?php

namespace Tests\Feature\Views;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SingleViewTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSingleViewRenderWhenUserLoggedIn()
    {
        $artwork = Artwork::factory()->create();
        $comments = [];

        $view = (string) $this->view('user_test.single',
                compact('artwork', 'comments')
        );

        $dom = new \DOMDocument();
        $dom->loadHTML($view);
        $dom = new \DOMXPath($dom);

        $action = route('single.comment', $artwork->id);

        $this->assertCount(
            1,
            $dom->query("//form[@method='post'][@action='$action']/textarea[@name='message']")
        );
    }
}
