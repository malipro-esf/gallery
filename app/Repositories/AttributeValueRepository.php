<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeValueRepository implements AttributeValueRepositoryInterface
{
    public function getAll($request)
    {
        $attributes = Attribute::all();

        if($request->attribute_id)
            $values = AttributeValue::where('attribute_id',$request->attribute_id)->with('attribute')->get();
        else
            $values =  AttributeValue::with('attribute')->get();

        return['values' => $values, 'attributes' => $attributes];
    }

    public function store($data)
    {
        $data->validate([
            'attribute_id' => 'required',
            'values' => 'required',
        ]);

        $values = $data->values;
        for ($i=0; $i<count($values['p']); ++$i) {
            if ($values['p'][$i]) {
                AttributeValue::create([
                    'attribute_id' => $data->attribute_id,
                    'value_persian' => $values['p'][$i],
                    'value_english' => $values['e'][$i],
                ]);
            }
        }
    }


    public function update(AttributeValue $attributeValue, $data)
    {
        $data->validate([
            'attribute_id' => 'required',
            'value_persian' => 'required',
            'value_english' => 'required',
        ]);

        $attributeValue->update($data->all());
    }

    public function delete(AttributeValue $attributeValue)
    {
        if($attributeValue->artworks->count()>0)
            return false;

        $attributeValue->delete();
        return true;
    }


}

