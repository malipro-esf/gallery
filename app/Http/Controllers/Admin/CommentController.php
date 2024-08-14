<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $repository;

    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->repository->getAll();

        return view('admin.comment.index', compact('comments'));
    }

    public function changeStatus(Request $request)
    {
        return $this->repository->changeStatus($request);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        return $this->repository->update($request, $comment);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
