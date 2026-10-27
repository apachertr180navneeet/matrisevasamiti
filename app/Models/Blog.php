<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'image',
        'short_description',
        'content',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'author_name',
        'views_count',
        'sort_order',
        'is_published',
        'published_date',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_date' => 'date',
        'views_count' => 'integer',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    /**
     * Estimated reading time in minutes
     */
    public function getReadingTimeAttribute(): int
    {
        $words = str_word_count(strip_tags($this->content ?? $this->short_description ?? ''));
        return max(1, (int) ceil($words / 200));
    }

    /**
     * Effective meta title for SEO
     */
    public function getEffectiveMetaTitleAttribute(): string
    {
        return !empty($this->meta_title) ? $this->meta_title : ($this->title . ' | Matri Seva Samiti');
    }

    /**
     * Effective meta description for SEO
     */
    public function getEffectiveMetaDescriptionAttribute(): string
    {
        if (!empty($this->meta_description)) {
            return $this->meta_description;
        }
        if (!empty($this->short_description)) {
            return Str::limit(strip_tags($this->short_description), 160);
        }
        return Str::limit(strip_tags($this->content ?? ''), 160);
    }

    protected static function booted()
    {
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            if (empty($blog->published_date)) {
                $blog->published_date = now();
            }
            if (empty($blog->author_name)) {
                $blog->author_name = 'Matri Seva Samiti';
            }
        });
    }
}
