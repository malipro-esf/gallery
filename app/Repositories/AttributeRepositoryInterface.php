<?php

namespace App\Repositories;

use App\Models\Attribute;

interface AttributeRepositoryInterface
{
    public function getAll();

    public function create();

    public function store($data);

    public function update(Attribute $attribute, $data);

}
