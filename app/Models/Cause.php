<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cause extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'goal_amount',
        'raised_amount',
        'image',
        'short_description',
        'description',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'goal_amount' => 'decimal:2',
        'raised_amount' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($cause) {
            if (empty($cause->slug)) {
                $cause->slug = Str::slug($cause->title);
            }
        });
    }

    public function getProgressPercentageAttribute(): int
    {
        if ($this->goal_amount <= 0) return 0;
        return (int) min(100, round(($this->raised_amount / $this->goal_amount) * 100));
    }
}
