<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = ['page', 'key', 'title', 'body', 'visible', 'sort'];

    protected $casts = ['visible' => 'boolean'];
}
