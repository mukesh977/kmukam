<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{
	public function subCategories()
	{
		return $this->hasMany('App\Models\Category', 'parent_id');
	}

	public function news()
	{
		return $this->belongsToMany(News::class, 'news_categories', 'category_id', 'news_id');
	}
}
