<?php

namespace Tests\Unit\Simple;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function test_a_category_has_a_persian_name()
    {
        $category = new Category(['name_persian' => 'cat1']);

        $this->assertEquals('cat1', $category->name_persian);

    }

}
