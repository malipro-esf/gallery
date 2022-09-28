<?php

namespace Simple;

use App\Models\Artwork;
use App\Models\BillItem;
use Tests\TestCase;

class BillItemTest extends TestCase
{
    /**
     * @var BillItem
     */
    private $billItem;
    /**
     * @var Artwork
     */
    private $artwork1;
    /**
     * @var Artwork
     */
    private $artwork2;

    /**
     *
     */
    public function setUp():void
    {
        $this->billItem = new BillItem();
        $this->artwork1 = new Artwork('artwork1', 1250000);
        $this->artwork2 = new Artwork('artwork2', 1410000);

        $this->billItem->add($this->artwork1);
        $this->billItem->add($this->artwork2);
    }
    /** @test  */
    public function bill_item_includes_of_an_artwork()
    {
        $this->assertCount(2, $this->billItem->artworks());
    }


}
