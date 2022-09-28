<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{

    public function getAll($type);

    public function create($data);

    public function store($data);

    public function edit(Category $category);

    public function update(Category $category, $data);

    public function delete($id);
}
