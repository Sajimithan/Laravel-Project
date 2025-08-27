<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthTip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category',
        'is_active',
        'priority',
        'author_id',
        'tags'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tags' => 'array'
    ];

    /**
     * Get the author of the health tip
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Scope to get only active tips
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get tips by category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get tips ordered by priority
     */
    public function scopeByPriority($query)
    {
        return $query->orderBy('priority', 'desc');
    }

    /**
     * Get random active tip
     */
    public static function getRandomTip()
    {
        return static::active()->inRandomOrder()->first();
    }

    /**
     * Get tips by category with limit
     */
    public static function getTipsByCategory($category, $limit = 5)
    {
        return static::active()
            ->byCategory($category)
            ->byPriority()
            ->limit($limit)
            ->get();
    }
}
