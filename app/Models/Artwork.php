<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Artwork extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_persian',
        'name_english',
        'idea_type',
        'paint_type',
        'year_created',
        'subject_persian',
        'subject_english',
        'statement_persian',
        'statement_english',
        'description_english',
        'description_persian',
        'price_rials',
        'price_usd',
        'sign',
        'frame',
        'inventory_status'
    ];

    //for test
    protected $persianName;
    private $rialsPrice;

    /**
     * @param $persianName
     * @param $rialsPrice
     */
//    public function __construct($persianName, $rialsPrice)
//    {
//        $this->persianName = $persianName;
//
//        $this->rialsPrice = $rialsPrice;
//    }

    /**
     * @return mixed
     * for test
     */
    public function rialsPrice()
    {
        return $this->rialsPrice;
    }

    /**
     * @return mixed
     * for test
     */
    public function persianName()
    {
        return $this->persianName;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function styles()
    {
        return $this->hasMany(ArtworkStyle::class, 'artwork_id');
    }
    public function techniques()
    {
        return $this->hasMany(ArtworkTechnique::class, 'artwork_id');
    }

    public function attributes()
    {
        return $this->hasMany(ArtworkAttribute::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //  should use hasOne because there is just one instance of each artwork
    public function bill()
    {
        return $this->hasOne(BillItem::class);
    }

    /** for test */
    public function countTag(): int
    {
        return $this->tags()->count();
    }

    /** for test */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /** for test */
    public function checkAddToFavorite()
    {
        return !! $this->favorites()->where('user_id', Auth::id())
            ->count();
    }


}
