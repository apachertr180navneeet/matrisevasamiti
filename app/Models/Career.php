<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'job_type',
        'location',
        'experience',
        'qualification',
        'stipend_salary',
        'short_description',
        'description',
        'deadline',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
