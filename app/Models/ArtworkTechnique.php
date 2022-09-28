<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkTechnique extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'technique_id'
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    public function technique()
    {
        return $this->belongsTo(Category::class);
    }
}
