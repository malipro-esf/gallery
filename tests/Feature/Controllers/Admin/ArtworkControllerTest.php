<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Artwork;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArtworkControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        $this->withExceptionHandling();
        Artwork::factory()->count(10)->create();

        $this
            ->actingAs(User::factory()->state(['type' => 'admin'])->create())
            ->get(route('artwork.index'))
            ->assertOk()
            ->assertViewIs('admin.artwork.index')
            ->assertViewHas('artworks', Artwork::latest()->paginate(15));

        $this->assertEquals(
            request()->route()->middleware(),
            ['web', 'admin']
        );

    }

    public function testCreatedMethod()
    {
        $this->withExceptionHandling();
        Tag::factory()->count(10)->create();
        Category::factory()->count(5)->create();
        Attribute::factory()->count(5)->create();

        $this
            ->actingAs(User::factory()->state(['type' => 'admin'])->create())
            ->get(route('artwork.create'))
            ->assertOk()
            ->assertViewIs('admin.artwork.create')
            ->assertViewHasAll([
                'categories' => Category::latest()->get(),
                'tags' => Tag::latest()->get(),
                'attributes' => Attribute::latest()->with('values')->get(),
            ]);

        $this->assertEquals(
            request()->route()->middleware(),
            ['web', 'admin']
        );

    }

    public function testEditMethod()
    {
        $this->withExceptionHandling();

        $artwork = Artwork::factory()->create();

        Tag::factory()->count(10)->create();
        Category::factory()->count(5)->create();
        Attribute::factory()->count(5)->create();

        $this
            ->actingAs(User::factory()->state(['type' => 'admin'])->create())
            ->get(route('artwork.edit', $artwork->id))
            ->assertOk()
            ->assertViewIs('admin.artwork.edit')
            ->assertViewHasAll([
                'artwork' => $artwork,
                'categories' => Category::latest()->get(),
                'tags' => Tag::latest()->get(),
                'attributes' => Attribute::latest()->with('values')->get(),
            ]);

        $this->assertEquals(
            request()->route()->middleware(),
            ['web', 'admin']
        );

    }
}
