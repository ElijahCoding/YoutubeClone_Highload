<?php

namespace App;

use App\User;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Subscription;

class Channel extends Model implements HasMedia
{
    use HasMediaTrait;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editable()
    {
        // i know it's shitty solution, i'll refactor it
        if (! auth()->check()) return false;

        return $this->user_id === auth()->id();
    }

    public function image()
    {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
