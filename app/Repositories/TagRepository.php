<?php
namespace App\Repositories;
use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagRepository implements TagRepositoryInterface
{
    public function getAll()
    {
        return Tag::all();
    }

    public function store($data)
    {
       $data->validate([
           'name_persian' => 'required|unique:tags',
           'name_english' => 'required|unique:tags',
       ]);

       Tag::create($data->all());
    }

    public function update(Tag $tag, $data)
    {
        $data->validate([
            'name_persian' => ['required',Rule::unique('tags')->ignore($tag->id)],
            'name_english' => ['required',Rule::unique('tags')->ignore($tag->id)],
        ]);

        $tag->update($data->all());

    }

    public function delete(Tag $tag)
    {
        // TODO: Implement delete() method.
    }

}
