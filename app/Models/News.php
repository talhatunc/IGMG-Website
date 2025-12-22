<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'summary',
        'content',
        'category',
        'tags',
        'is_published',
        'published_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
