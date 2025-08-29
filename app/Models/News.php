<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'publish_date',
        'is_published',
        'author_id',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'is_published' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Generate slug from title
    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = \Illuminate\Support\Str::slug($news->title);
        });

        static::updating(function ($news) {
            $news->slug = \Illuminate\Support\Str::slug($news->title);
        });
    }

    // Scope for published news
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('publish_date', '<=', now());
    }

    // Get the URL for the news item
    public function getUrlAttribute()
    {
        return route('news.show', $this->slug);
    }
}