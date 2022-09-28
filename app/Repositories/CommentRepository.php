<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function getAll()
    {
        return Comment::with('artwork')->get();
    }

    public function store($data)
    {

    }

    public function changeStatus(Comment $comment, $status)
    {
        // TODO: Implement changeStatus() method.
    }
}
