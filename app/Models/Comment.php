<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'user_id',
        'user_fullname',
        'email',
        'comment',
        'reply',
        'parent_id',
        'ip_address',
        'agent_system',
        'verification_status'
    ];

   public function commentable()
   {
       return $this->morphTo();
   }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
