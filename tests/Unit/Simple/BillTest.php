<?php

namespace Simple;

use App\Models\Bill;
use App\Models\BillItem;
use Tests\TestCase;

class BillTest extends TestCase
{
    /**
     * @var Bill
     */
    private $bill;
    /**
     * @var BillItem
     */
    private $item1;
    /**
     * @var BillItem
     */
    private $item2;


    /**
     *
     */
    public function setUp():void
    {
        $this->bill = new Bill();

        $this->item1 = new BillItem();
        $this->item2 = new BillItem();

        $this->bill->addItem($this->item1,3000);
        $this->bill->addItem($this->item2,2000);

    }

    /**
     *
     */
    public function test_a_bill_includes_item()
    {
        $this->assertCount(2, $this->bill->testItems());

    }

    /**
     *
     */
    public function test_bill_calculate_total_price()
    {
        $this->assertEquals(5000,$this->bill->totalPrice());
    }

}
