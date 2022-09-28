<?php
namespace App\Repositories;

use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function getAll();

    public function store($data);

    public function changeStatus(Comment $comment, $status);

}
