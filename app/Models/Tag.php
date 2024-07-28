<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_persian',
        'name_english',
    ];

    public function taggables()
    {
        return $this->morphedByMany(Taggable::class, 'taggable');
    }

    public function getNameAttribute()
    {
        $locale = session()->get('locale');
        return $locale == 'en' ? $this->name_english : $this->name_persian;
    }
}
