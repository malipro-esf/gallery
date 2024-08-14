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
        'user_agent',
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

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasOne(Comment::class, 'parent_id');
    }

}
