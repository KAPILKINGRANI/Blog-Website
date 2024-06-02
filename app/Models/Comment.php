<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function post()
    {
        //Many Comments Belongs to one post
        return $this->belongsTo(Post::class);
    }
    public function author()
    {
        //many comments belongs to one user
        return $this->belongsTo(User::class, 'user_id');
    }
}
