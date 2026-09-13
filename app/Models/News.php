<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'is_featured' => 'boolean',
        ];
    }

    public function getJudulAttribute(): ?string
    {
        return $this->attributes['title'] ?? null;
    }

    public function setJudulAttribute($value): void
    {
        $this->attributes['title'] = $value;
    }

    public function getKontenAttribute(): ?string
    {
        return $this->attributes['content'] ?? null;
    }

    public function setKontenAttribute($value): void
    {
        $this->attributes['content'] = $value;
    }

    public function getThumbnailAttribute(): ?string
    {
        return $this->attributes['image'] ?? null;
    }

    public function setThumbnailAttribute($value): void
    {
        $this->attributes['image'] = $value;
    }

    public function getStatusBeritaAttribute(): string
    {
        return ($this->is_featured ?? false) ? 'headline' : 'regular';
    }

    public function getStatusPublishAttribute(): string
    {
        return 'publish';
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->category ?? 'Kegiatan';
    }

    public function getKategoriAttribute()
    {
        return (object) [
            'id' => 1,
            'nama_kategori' => $this->category ?? 'Kegiatan',
        ];
    }
}
