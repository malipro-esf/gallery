<?php

namespace Database\Seeders;

use App\Models\BillItem;
use Illuminate\Database\Seeder;

class BillItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BillItem::factory()->count(5)->create();
    }
}
