<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'topic_id', 'title',
        'description', 'content',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Magic property using get***Attribute
     */
    public function getMinutesToReadAttribute()
    {
        $avgWordPerMinute = 200;
        $noOfWords = count(explode(" ", strip_tags($this->content)));
        $readTime = ceil($noOfWords / $avgWordPerMinute);
        return "${readTime} mintues to read";
    }
}
