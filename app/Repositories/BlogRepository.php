<?php

namespace App\Repositories;
use App\Models\Blog;
use Illuminate\Validation\Rule;

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
            'title_persian' => 'required|min:3|unique:blogs,title_persian',
            'title_english' => 'required|min:3|unique:blogs,title_english',
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
        $validatedData = $data->validate([
            'title_persian' => ['required','min:3',Rule::unique('blogs')->ignore($blog->id)],
            'title_english' => ['required','min:3',Rule::unique('blogs')->ignore($blog->id)],
            'content_persian' => 'required|min:3',
            'content_english' => 'required|min:3',
        ]);

        $blog->update($validatedData);

        $blogs = $this->getAll();
        return view('admin.blog.index', compact('blogs'))->with('success-message', 'create_successful');

    }

    public function delete(Blog $blog)
    {
        if($blog->delete())
            return true;
        else
            return false;
    }

}
