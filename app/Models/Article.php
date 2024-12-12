<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'image_path'];

    public function tag()
    {
        return $this->belongsToMany(\App\Models\Tags::class, 'article_tags');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
