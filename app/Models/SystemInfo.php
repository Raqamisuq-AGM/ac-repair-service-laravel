<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slogan',
        'phone',
        'about',
        'address',
        'logo',
        'favicon',
        'avatar',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'portfolio',
        'dribble',
        'github',
        'tiktok',
        'wechat',
        'whatsapp',
        'telegram',
        'skype',
        'youtube',
        'tubmlr',
        'medium',
        'twitch',
        'threads',
        'discord',
        'meta_title',
        'meta_description',
        'meta_tags',
        'og_thumbnail',
    ];

    protected function casts(): array
    {
        return [
            'meta_tags' => 'array',
        ];
    }
}
