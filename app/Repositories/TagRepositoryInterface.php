<?php
namespace App\Repositories;

use App\Models\Tag;

interface TagRepositoryInterface
{
    public function getAll();

    public function store($data);

    public function update(Tag $tag, $data);

    public function delete(Tag $tag);
}
