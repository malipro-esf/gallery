<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposedPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'user_id',
        'artwork_id',
        'price',
        'status',
        'description'
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}
