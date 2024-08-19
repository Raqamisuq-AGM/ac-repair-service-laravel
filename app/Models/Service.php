<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_title',
        'icon',
        'short_icon',
        'position',
        'cover_photo',
        'desc',
        'short_desc',
        'category',
        'sub_category',
        'tags',
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'meta_author',
        'meta_tags',
        'meta_og_thumb',
        'status'
    ];
}
