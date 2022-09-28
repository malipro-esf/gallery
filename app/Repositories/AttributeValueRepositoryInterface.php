<?php

namespace App\Repositories;

use App\Models\AttributeValue;

interface AttributeValueRepositoryInterface
{
    public function getAll($request);

    public function store($data);

    public function update(AttributeValue $attributeValue, $data);

    public function delete(AttributeValue $attributeValue);

}
