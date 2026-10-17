<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// for spatie Media
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model implements HasMedia
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $with = ['media'];
    protected $hidden = ['media'];
    protected $appends = ['image_url', 'thumbnail_url'];

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function registerMediaCollections(): void
    {
        $placeholder = asset('img/fallback/product-fallback-svg.svg');
        $placeholderPath = public_path('img/fallback/product-fallback-svg.svg');

        $this->addMediaCollection('product_image')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/webp',
            ])
            ->useFallbackUrl($placeholder)
            ->useFallbackPath($placeholderPath)
            ->useFallbackUrl($placeholder, 'webp')
            ->useFallbackPath($placeholderPath, 'webp')
            ->useFallbackUrl($placeholder, 'thumbnail')
            ->useFallbackPath($placeholderPath, 'thumbnail');
    }

    public function registerMediaConversions(?Media $media = null): void
    {

        $this->addMediaConversion('webp')
            ->format('webp')
            ->nonQueued();

        // $this->addMediaConversion('avatar')
        //     ->format('webp')
        //     ->width(300)
        //     ->height(300)
        //     ->sharpen(10)
        //     ->nonQueued();

        $this->addMediaConversion('thumbnail')
            ->format('webp')
            ->fit(Fit::Crop, 300, 300)
            ->sharpen(10)
            ->nonQueued();
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn() => $this->getFirstMediaUrl('product_image', 'webp'));
    }

    protected function thumbnailUrl(): Attribute
    {
        return Attribute::get(fn() => $this->getFirstMediaUrl('product_image', 'thumbnail'));
    }
}
