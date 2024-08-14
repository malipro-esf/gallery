<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function getAll()
    {
        return Comment::all();
    }

    public function store($data)
    {

    }
    public function update($data, Comment $comment)
    {
        $result = $comment->update(['reply' => $data['reply']]);
        if($result)
            return back()->with('success-message', __('update_successful'));
        else
            return back()->with('error-message',__('error failed'));

    }

    public function changeStatus($data)
    {
        $status = $data['status']?'0':'1';
        $result = Comment::find($data['commentId'])->update(['verification_status' => $status]);
        if($result)
            return response()->json(['success' => true],200);
        else
            return response()->json(['success' => false],500);
    }
}
