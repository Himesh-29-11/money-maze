<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaEntry extends Model
{
    protected $fillable = ['type', 'label', 'title', 'meta1', 'meta2', 'description', 'image', 'duration', 'url', 'sort'];
}
