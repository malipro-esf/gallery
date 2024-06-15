<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'user_id',
        'user_fullname',
        'email',
        'message',
        'reply',
        'ip_address',
        'agent_system',
        'verification_status'
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
