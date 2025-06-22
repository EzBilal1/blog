<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'content',
        'image',
        'image_alt',
        'tags',
        'category',
        'meta_description',
        'focus_keyword',
        'allow_comments',
        'featured',
        'email_notify',
    ];

    protected $casts = [
        'tags' => 'array',
        'allow_comments' => 'boolean',
        'featured' => 'boolean',
        'email_notify' => 'boolean',
    ];

    protected $hidden = ['pivot'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
