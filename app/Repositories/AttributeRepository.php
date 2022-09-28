<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeRepository implements AttributeRepositoryInterface
{
    public function getAll()
    {
        return Attribute::with('values')->get();
    }

    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store($data)
    {
        $data->validate([
            'name_persian' => 'required|unique:attributes',
            'name_english' => 'required|unique:attributes',
            'filterable' => 'nullable',
            'values' => 'required'
        ]);

        $filterable = $data->filterable ? '1' : '0';
        $attribute = Attribute::create([
            'name_persian' => $data->name_persian,
            'name_english' => $data->name_english,
            'filterable ' => $filterable
        ]);


        //save attribute values
        $values = $data->values;
        for ($i=0; $i<count($values['p']); ++$i) {
            if ($values['p'][$i]) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'value_persian' => $values['p'][$i],
                    'value_english' => $values['e'][$i],
                ]);
            }
        }

    }

    public function update(Attribute $attribute, $data)
    {
        $data->validate([
            'name_persian' => 'required|unique:attributes,name_persian,'.$attribute->id.'',
            'name_english' => 'required|unique:attributes,name_english,'.$attribute->id.'',
            'filterable' => 'nullable',
        ]);

        $filterable = $data->filterable ? '1' : '0';
        $attribute->update([
            'name_persian' => $data->name_persian,
            'name_english' => $data->name_english,
            'filterable ' => $filterable
        ]);

    }



}
