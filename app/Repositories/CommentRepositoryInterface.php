<?php
namespace App\Repositories;

use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function getAll();

    public function store($data);

    public function update($data, Comment $comment);

    public function changeStatus($data);

}
