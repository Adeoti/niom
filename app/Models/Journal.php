<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Journal extends Model
{
    protected $fillable = [
        'name',
        'year',
        'volume',
        'issue',
        'description',
        'cover_image',
        'pdf_path',
        'is_published',
        'published_at',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'sort_order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::deleting(function (Journal $journal): void {
            if ($journal->pdf_path && Storage::disk('public')->exists($journal->pdf_path)) {
                Storage::disk('public')->delete($journal->pdf_path);
            }

            if ($journal->cover_image && Storage::disk('public')->exists($journal->cover_image)) {
                Storage::disk('public')->delete($journal->cover_image);
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true)
            ->where(function (Builder $query) {
                $query
                    ->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    public function getPdfUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->pdf_path);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        if (! $this->cover_image) {
            return null;
        }

        return Storage::disk('public')->url($this->cover_image);
    }
}