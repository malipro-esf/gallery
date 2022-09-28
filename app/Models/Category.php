<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, SoftDeletes /*HasTranslations*/;

    protected $fillable = [
        'name_persian',
        'name_english',
        'type',
        'description_persian',
        'description_english',
    ];
//    public $translatable = ['name','description'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function artworkStyles()
    {
        return $this->hasMany(ArtworkStyle::class, 'style_id');
    }

    public function artworkTechniques()
    {
        return $this->hasMany(ArtworkTechnique::class, 'technique_id');
    }
}
