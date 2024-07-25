<?php

namespace App\Repositories;
use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAll($data = null)
    {
        return Blog::paginate(10);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store($data)
    {
        $data->validate([
            'title_persian' => 'required|min:3',
            'title_english' => 'required|min:3',
            'content_persian' => 'required|min:3',
            'content_english' => 'required|min:3',
        ]);


        Blog::create([
            'title_persian' => $data->input('title_persian'),
            'title_english' => $data->input('title_english'),
            'content_persian' => $data->input('content_persian'),
            'content_english' => $data->input('content_english'),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));

    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Blog $blog, $data)
    {
        $blog->update($data);

        return view('admin.blog.index')->with('success-message', 'create_successful');

    }

    public function delete(Blog $blog)
    {
        $blog->delete();
    }

}
