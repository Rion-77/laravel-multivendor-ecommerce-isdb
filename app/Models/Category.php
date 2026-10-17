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
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model implements HasMedia
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, InteractsWithMedia;

    protected $with = ['media'];
    protected $hidden = ['media'];
    protected $appends = ['icon_url'];

    public function registerMediaCollections(): void
    {
        $placeholder = asset('img/fallback/category-fallback.svg');
        $placeholderPath = public_path('img/fallback/category-fallback.svg');

        $this->addMediaCollection('category_icon')
            ->singleFile()
            ->acceptsMimeTypes([
                'image/png',
                'image/jpeg',
                'image/webp',
                'image/avif',
                'image/svg+xml',
            ])
            ->useFallbackUrl($placeholder)
            ->useFallbackPath($placeholderPath);
    }

     protected function iconUrl(): Attribute
    {
        return Attribute::get(fn() => $this->getFirstMediaUrl('category_icon'));
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
