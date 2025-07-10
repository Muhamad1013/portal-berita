<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'user_id',
        'content',
        'parent_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies', 'user', 'reactions');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }


    public function reactions()
    {
        return $this->hasMany(CommentReaction::class);
    }

    public function reactionByAuthUser()
    {
        return $this->hasOne(CommentReaction::class)->where('user_id', auth()->id());
    }

}
