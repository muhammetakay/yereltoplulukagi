<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'category_id',
        'user_id',
    ];

    public function getTitleAttribute($value) {
        return strtoupper_tr($value);
    }

    // relations

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function writer() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }
}
