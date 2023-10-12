<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'price',
        'featured_image',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    use HasFactory;
}
