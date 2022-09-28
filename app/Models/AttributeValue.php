<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeValue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'attribute_id',
        'value_persian',
        'value_english',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function artworks()
    {
        return $this->hasMany(ArtworkAttribute::class,'attributevalue_id');
    }
}
