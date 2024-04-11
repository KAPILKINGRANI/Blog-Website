<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //here if u don't pass user_id laravel will find as author_id
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeSearch($query)
    {
        $searchKey = request('search');

        if ($searchKey) {
            $query = $query->where('title', 'like', "%${searchKey}%");
        }

        return $query;
    }
    public function getStatusAttribute()
    {
        return $this->published_at === null ? "<span class='badge bg-warning'>Draft</span>" : "<span class='badge bg-success'>Published</span>";
    }
}
