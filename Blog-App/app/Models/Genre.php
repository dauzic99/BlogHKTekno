<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'genre_name',
    ];
    public function post()
    {
        return $this->hasMany(Posts::class);
    }
}
