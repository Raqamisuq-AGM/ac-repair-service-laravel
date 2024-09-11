<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUserMail extends Model
{
    use HasFactory;

    const STATUS_UNREAD = 0;
    const STATUS_READ = 1;
    const STATUS_DELETED = 2;
    const TYPE_INCOMING = 1;
    const TYPE_OUTGOING = 0;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'type',
    ];

    /**
     * Get the human-readable status name.
     *
     * @return string
     */
    public function getStatusNameAttribute(): string
    {
        switch ($this->attributes['status']) {
            case self::STATUS_UNREAD:
                return 'Unread';
            case self::STATUS_READ:
                return 'Read';
            case self::STATUS_DELETED:
                return 'Deleted';
            default:
                return 'Unknown';
        }
    }

    public function getTypeNameAttribute(): string
    {
        switch ($this->attributes['status']) {
            case self::TYPE_INCOMING:
                return 'Inbox';
            case self::STATUS_READ:
                return 'Sent';
            default:
                return 'Unknown';
        }
    }
}
