<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Team extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'description',
        'fb',
        'twitter',
        'instagram',
        'whatsapp',
    ];

    // Accessor for status
    // public function getStatusAttribute($value)
    // {
    //     $status = [
    //         0 => 'inactive',
    //         1 => 'active',
    //         2 => 'deleted',
    //     ];

    //     return $status[$value];
    // }

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
