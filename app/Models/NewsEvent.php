<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsEvent extends Model
{
    use HasFactory;

    protected $table = 'news_events';

    protected $fillable = [
        'title',
        'slug',
        'type',
        'category',
        'published_date',
        'image',
        'excerpt',
        'content',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }
}
