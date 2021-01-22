<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Sluggable;

class Posts extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover',
        'tags',
        'status',
        'genre_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
