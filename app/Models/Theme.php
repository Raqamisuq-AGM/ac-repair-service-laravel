<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumbnail',
        'short_desc',
        'raqamisuq_email',
        'raqamisuq_license_code',
        'status',
        'verified',
    ];

    public function getStatusAttribute(): string
    {
        return $this->attributes['status'] ? 'active' : 'inactive';
    }

    public function getVerifiedAttribute(): string
    {
        return $this->attributes['verified'] ? 'verified' : 'unverified';
    }

    public function setStatusAttribute($value): void
    {
        $this->attributes['status'] = ($value === 'active') ? 1 : 0;
    }

    public function setVerifiedAttribute($value): void
    {
        $this->attributes['verified'] = ($value === 'verified') ? 1 : 0;
    }
}
