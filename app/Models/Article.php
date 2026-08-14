<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'topic',
        'publication',
        'excerpt',
        'image',
        'published_at',
        'english_url',
        'gujarati_url',
        'featured',
    ];

    protected $casts = [
        'published_at' => 'date',
        'featured' => 'boolean',
    ];
}
