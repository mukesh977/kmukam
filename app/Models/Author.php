<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function news()
    {
        return $this->hasMany('App\Models\News', 'author_id')->orderBy('published_date', 'DESC');
    } 
    
    public function socialMedia()
    {
        return $this->hasMany('App\Models\AuthorSocialMedia', 'author_id');
    }
}
