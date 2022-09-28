<?php namespace App\Repositories;


use App\Models\Category;
use App\Models\Image;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll($type)
    {
        if($type)
            return Category::with('image')->where('type', $type)
                            ->latest()->get();
        else
            return Category::with('image')->latest()->get();


    }

    public function create($data)
    {
        $type= $data->type;
        return view('admin.category.create',compact('type'));
    }

    public function store($data)
    {
        $data->validate([
            'name_persian' => 'required|min:3|unique:categories',
            'name_english' => 'required|min:3|unique:categories',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'description_persian' => 'nullable',
            'description_english' => 'nullable',
        ]);

        $category = Category::create($data->except('image'));

        //save image
        if($data->image) {
            $file = $data->image;
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/category'), $fileName);

            $category->image()->create([
                'url' => $fileName,

            ]);

        }

        return $data->type;

    }

    public function edit($category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update($category, $data)
    {
        $data->validate([
            'name_persian' => 'required|min:3|unique:categories,name_persian,' . $category->id . '',
            'name_english' => 'required|min:3|unique:categories,name_english,' . $category->id . '',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'description_persian' => 'nullable',
            'description_english' => 'nullable',
        ]);

        $category->update($data->except('image'));

        //update image
        if($data->image) {
            $file = $data->image;
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/category'), $fileName);

            if($category->image)
                 $category->image()->update(['url' => $fileName]);
            else
                $category->image()->create(['url' => $fileName]);


        }

    }

    public function delete($id)
    {
        $category = Category::with('image')->find($id);

        if($category->artworkStyles->count()>0 || $category->artworkTechniques->count()>0)
            return false;

        if($category->image)
            $category->image()->delete();

        $category->delete();
        return true;
    }

}

