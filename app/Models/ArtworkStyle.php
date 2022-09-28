<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'style_id'
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    public function style()
    {
        return $this->belongsTo(Category::class);
    }

}
