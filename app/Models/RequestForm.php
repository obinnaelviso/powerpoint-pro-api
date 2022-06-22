<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RequestForm extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('receipt');
    }

    public function getAmountStringAttribute() {
        return config('app.currency').$this->amount;
    }

    public function getHasMediaAttribute(): bool
    {
        return $this->hasMedia('receipt');
    }

    public function getUrlAttribute(): string
    {
        return $this->has_media ? $this->getFirstMediaUrl('receipt') : '';
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


}
