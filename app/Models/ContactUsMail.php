<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'message',
        'status'
    ];

    // Accessor for status
    public function getStatusAttribute($value)
    {
        $status = [
            0 => 'unread',
            1 => 'read',
            2 => 'deleted',
        ];

        return $status[$value];
    }
}
