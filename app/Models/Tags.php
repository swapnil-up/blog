<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tags extends Model
{
    protected $fillable = ['name', 'color'];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
