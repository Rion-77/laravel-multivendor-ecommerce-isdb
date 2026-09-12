<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Enums\Fit;
// for spatie Media
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    use InteractsWithMedia;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $with = ['media'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
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

        $this->addMediaConversion('avatar')
            ->format('webp')
            ->fit(Fit::Crop, 300, 300)
            ->sharpen(10)
            ->nonQueued();
    }
}
