<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'question'
            ]
        ];
    }

    protected $fillable = [
        'question',
        'answer',
        'slug',
        'status',
        'tags'
    ];

}
