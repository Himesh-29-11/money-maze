<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavLink extends Model
{
    protected $fillable = ['label', 'url', 'sort', 'active'];

    protected $casts = ['active' => 'boolean'];
}
