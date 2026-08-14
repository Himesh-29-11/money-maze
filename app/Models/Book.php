<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['key', 'title', 'subtitle', 'description', 'cover', 'featured', 'sort'];

    protected $casts = ['featured' => 'boolean'];
}
