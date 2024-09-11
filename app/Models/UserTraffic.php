<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraffic extends Model
{
    use HasFactory;

    protected $fillable = [
        'visited_page',
        'ip',
        'country',
        'city',
        'state',
        'zip_code',
        'platform',
        'device',
        'browser',
    ];
}
