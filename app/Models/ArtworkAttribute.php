<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['artwork_id','attributevalue_id'];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);

    }

    public function attrValue()
    {
        return $this->belongsTo(AttributeValue::class, 'attributevalue_id');

    }
}
