<?php

namespace App\Repositories;

use App\Models\Blog;

interface BlogRepositoryInterface
{
    public function getAll($data=null);

    public function create();

    public function store($data);

    public function show(Blog $blog);

    public function edit(Blog $blog);

    public function update(Blog $blog, $data);

    public function delete(Blog $blog);
}
