<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailGateway extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const IS_DEFAULT_YES = 1;
    const IS_DEFAULT_NO = 0;

    protected $fillable = [
        'name',
        'thumbnail',
        'driver',
        'host',
        'port',
        'username',
        'password',
        'encryption',
        'from_name',
        'from_address',
        'status',
        'is_default',
    ];

    public function getStatusNameAttribute(): string
    {
        switch ($this->attributes['status']) {
            case self::STATUS_ACTIVE:
                return 'Active';
            case self::STATUS_INACTIVE:
                return 'Inactive';
            default:
                return 'Unknown';
        }
    }

    public function getIsDefaultNameAttribute(): string
    {
        switch ($this->attributes['status']) {
            case self::IS_DEFAULT_YES:
                return 'Yes';
            case self::IS_DEFAULT_NO:
                return 'No';
            default:
                return 'Unknown';
        }
    }
}
