<?php

namespace App\Repositories;

use App\Models\Artwork;
use App\Models\ArtworkAttribute;
use App\Models\ArtworkStyle;
use App\Models\ArtworkTag;
use App\Models\ArtworkTechnique;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Tag;

class ArtworkRepository implements ArtworkRepositoryInterface
{
    public function getAll($data = null)
    {
        return Artwork::with('images', 'styles', 'techniques')->get();
    }

    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        $attributes = Attribute::with('values')->get();

        return['categories' => $categories, 'tags' => $tags, 'attributes' => $attributes];

    }

    public function store($data)
    {
        $artwork = Artwork::create($data->except('images', 'techniques', 'styles', 'tags', 'attrValues'));

        //save tags
        foreach ($data->tags as $tag)
            ArtworkTag::create(['artwork_id' => $artwork->id, 'tag_id' => $tag]);

        //save styles
        foreach ($data->styles as $style)
            ArtworkStyle::create(['artwork_id' => $artwork->id, 'style_id' => $style]);

        //save techniques
        foreach ($data->techniques as $technique)
            ArtworkTechnique::create(['artwork_id' => $artwork->id, 'technique_id' => $technique]);

        //save images
        foreach ($data->images as $image) {
            $fileName = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('images/artworks'), $fileName);

            $artwork->images()->create(['url' => $fileName]);
        }

        //save attributes
        if ($data->attrValues) {
            foreach ($data->attrValues as $attr)
                ArtworkAttribute::create([
                    'artwork_id' => $artwork->id,
                    'attributevalue_id' => $attr
                ]);
        }

        return view('admin.artwork.index')->with('success-message', 'create_successful');
    }

    public function show(Artwork $artwork)
    {
        return view('admin.artwork.show', compact('artwork'));

    }

    public function edit(Artwork $artwork)
    {
        $artAttrs = [];
        $categories = Category::all();

        $tags = Tag::all();

        $attributes = Attribute::with('values')->get();

        //get artwork tags
        foreach ($artwork->tags as $tag)
            $artTags[] = $tag->tag_id;

        //get artwork styles
        foreach ($artwork->styles as $style)
            $artStyles[] = $style->style_id;

        //get artwork techniques
        foreach ($artwork->techniques as $technique)
            $artTechniques[] = $technique->technique_id;

        //get artwork techniques
        foreach ($artwork->attributes as $attr)
            $artAttrs[] = $attr->attributevalue_id;

        return view('admin.artwork.edit',
            compact('categories', 'tags', 'attributes', 'artwork', 'artTags', 'artTechniques', 'artStyles', 'artAttrs'));
    }

    public function update(Artwork $artwork, $data)
    {
        $artwork->update($data->except('images', 'techniques', 'styles', 'tags', 'attrValues'));

        $artwork->tags()->delete();
        //save tags
        foreach ($data->tags as $tag)
            ArtworkTag::create(['artwork_id' => $artwork->id, 'tag_id' => $tag]);

        $artwork->styles()->delete();
        //save styles
        foreach ($data->styles as $style)
            ArtworkStyle::create(['artwork_id' => $artwork->id, 'style_id' => $style]);

        $artwork->techniques()->delete();
        //save techniques
        foreach ($data->techniques as $technique)
            ArtworkTechnique::create(['artwork_id' => $artwork->id, 'technique_id' => $technique]);

        //save images
        if ($data->images) {
            $artwork->images()->delete();

            foreach ($data->images as $image) {
                $fileName = date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('images/artworks'), $fileName);

                $artwork->images()->create(['url' => $fileName]);
            }

        }
        //save attributes
        if ($data->attrValues) {
            foreach ($data->attrValues as $attr)
                ArtworkAttribute::create([
                    'artwork_id' => $artwork->id,
                    'attributevalue_id' => $attr
                ]);
        }

        return view('admin.artwork.index')->with('success-message', 'create_successful');

    }

    public function delete(Artwork $artwork)
    {
        if($artwork->inventory_status=='sold')
            return back()->with('error-message','sold can not delete');

        $artwork->delete();
        return back()->with('success-message','delete_successful');
    }

}
