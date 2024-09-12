<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
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
        'status',
        'meta_title',
        'meta_description',
        'meta_tags',
    ];

    protected function casts(): array
    {
        return [
            'meta_tags' => 'array',
        ];
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

    /**
     * Get the human-readable status name.
     *
     * @return string
     */
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

    public function subServices()
    {
        return $this->hasMany(SubService::class);
    }
}
