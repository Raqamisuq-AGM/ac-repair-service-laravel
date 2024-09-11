<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'name',
        'slug',
        'position',
        'photo',
        'description',
        'fb',
        'twitter',
        'instagram',
        'whatsapp',
        'status',
    ];

    public function getStatusNameAttribute(): string
    {
        switch ($this->attributes['status']) {
            case self::STATUS_INACTIVE:
                return 'Inactive';
            case self::STATUS_ACTIVE:
                return 'Active';
            default:
                return 'Unknown';
        }
    }
}
