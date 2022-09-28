<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bill_id',
        'artwork_id'
    ];

    protected $artworks = [];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    /** for test */
    public function add(Artwork $artwork)
    {
        $this->artworks[] = $artwork;
    }

    /** for test */
    public function artworks()
    {
        return $this->artworks;
    }
    /** for test */


}
