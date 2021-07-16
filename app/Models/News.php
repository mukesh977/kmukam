<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Trend;

class News extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'news_categories', 'news_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'news_tags', 'news_id', 'tag_id');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }

    public function trends()
    {
        return $this->belongsToMany(Trend::class);
    }
}
