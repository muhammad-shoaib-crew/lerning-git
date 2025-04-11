<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    /** @use HasFactory<\Database\Factories\BlogTagsFactory> */
    use HasFactory;

    public function blogs(){
        return $this->belongsToMany(Blog::class, table:'blogs_tags_pivot');
    }
}
