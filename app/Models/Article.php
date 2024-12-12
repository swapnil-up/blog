<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    public function tag()
    {
        return $this->belongsToMany(\App\Models\Tags::class, 'article_tags');
    }
}
