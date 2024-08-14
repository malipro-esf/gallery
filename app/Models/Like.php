<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'likeable_type',
        'likeable_id',
        'ip_address',
        'user_id',
        'agent_system',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }
}
