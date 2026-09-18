<?php

namespace App\Models;

use App\Enums\VendorStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// for spatie Media
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vendor extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\VendorFactory> */
    use HasFactory;

    use InteractsWithMedia;
    protected $with = ['media'];

    protected $casts = [
        'status' => VendorStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('logo')
            ->format('webp')
            ->width(300)
            ->height(300)
            ->sharpen(10)
            ->nonQueued();
    }
}
