<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'user_id',
        'news_id',
        'reply_to',
    ];

    // relations

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function news() {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'reply_to', 'id');
    }
}
