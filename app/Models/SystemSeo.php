<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSeo extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'meta_author',
        'meta_og_thumb',
    ];
}
