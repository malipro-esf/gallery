<?php

namespace Tests\Feature\Models;

use App\Models\ProposedPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProposedPricesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertData()
    {
        $data = ProposedPrice::factory()->make()->toArray();

        ProposedPrice::create($data);

        $this->assertDatabaseHas('proposed_prices', $data);

    }
}
