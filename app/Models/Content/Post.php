<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' =>['source' => 'title']
        ];
    }

    protected $fillable = [
        'title',
        'summary',
        'slug',
        'image',
        'status',
        'tags',
        'body',
        'published_at',
        'author_id',
        'category_id',
        'commentable'
    ];
}
