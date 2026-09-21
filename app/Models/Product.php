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

class Product extends Model implements HasMedia
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $with = ['media'];

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
}
