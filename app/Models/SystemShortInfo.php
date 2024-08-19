<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemShortInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'whatsapp',
        'address',
    ];
}
