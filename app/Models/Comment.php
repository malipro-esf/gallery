<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'user_name',
        'email',
        'message',
        'ip_address',
        'agent_system',
        'user_id',
        'verification_status'
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}
