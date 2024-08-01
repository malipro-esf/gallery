<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_persian',
        'title_english',
        'content_persian',
        'content_english'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function shortDescription()
    {
        $content = session()->get('locale') == 'en' ? $this->content_english : $this->content_persian;
        $words = explode(' ', $content);
        if (count($words) > 30) {
            $words = array_slice($words, 0, 30);
            $content = implode(' ', $words) . '...';
        }
        return $content;
    }

    public function title()
    {
        return session()->get('locale') == 'en' ? $this->title_english : $this->title_persian;
    }

}
