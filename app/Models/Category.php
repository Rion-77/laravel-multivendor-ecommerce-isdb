<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// for spatie Media
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, InteractsWithMedia;

    protected $with = ['media'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category_icon')
            ->singleFile()
            ->acceptsMimeTypes([
                'image/png',
                'image/jpeg',
                'image/webp',
                'image/avif',
                'image/svg+xml',
            ]);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('icon-sm')
            ->performOnCollections('category_icon')
            ->format('webp')
            ->fit(Fit::Contain, 96, 96)
            ->quality(85)
            ->nonQueued();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
