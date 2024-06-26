<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkTag extends Model
{
    use HasFactory;

    protected $table = 'artwork_tag';

    protected $fillable = [
        'artwork_id',
        'tag_id'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

}
