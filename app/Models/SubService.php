<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class SubService extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'meta_title',
        'meta_description',
        'meta_tags',
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

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
