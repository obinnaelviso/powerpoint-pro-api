<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageRev extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAmountStringAttribute() {
        return config('app.currency').$this->amount;
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
