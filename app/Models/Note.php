<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'tags', 'additional_properties'];

    protected $casts = [
        'tags' => 'array',
        'additional_properties' => 'array',
    ];
}
