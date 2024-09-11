<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory, Sluggable;

    const STATUS_UNPUBLISHED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_DELETED = 2;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'thumbnail',
        'content',
        'category',
        'sub_category',
        'stauts',
        'meta_title',
        'meta_description',
        'meta_tags',
    ];



    protected $casts = [
        'meta_tags' => 'array',
    ];

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

    public function getStatusNameAttribute(): string
    {
        switch ($this->attributes['status']) {
            case self::STATUS_PUBLISHED:
                return 'Published';
            case self::STATUS_UNPUBLISHED:
                return 'Unpublished';
            case self::STATUS_DELETED:
                return 'Deleted';
            default:
                return 'Unknown';
        }
    }
}
