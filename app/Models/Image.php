<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // protected $table = 'image'; //fucking table names needing to be singular or plural
    protected $fillable = ['article_id', 'file_path'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
