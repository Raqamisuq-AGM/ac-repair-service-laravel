<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
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

    // Accessor for status
    public function getStatusAttribute($value)
    {
        $status = [
            0 => 'inactive',
            1 => 'active',
            2 => 'deleted',
        ];

        return $status[$value];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
