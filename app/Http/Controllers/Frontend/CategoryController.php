<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Advertisement;
use App\Models\Trend;

class CategoryController extends Controller
{
	public function index($slug = '')
	{
		$category = Category::where('slug', $slug)->first();
		$categoryNews = News::join('news_categories', 'news.id', 'news_categories.news_id')
			->join('categories', 'news_categories.category_id', 'categories.id')
			->join('authors', 'news.author_id', 'authors.id')
			->where('categories.slug', $slug)
			->where('categories.status', 1)
			->where('news.status', 1)
			->orderBy('news.published_date', 'DESC')
			->select('news.*', 'authors.name as author_name', 'authors.id as author_id')
			->distinct()
			->paginate(12);

		$today = date('Y-m-d H:i:s');
		$ads = Advertisement::where('section', 'category')->get();

		return view('frontend.category', compact('categoryNews', 'category', 'ads', 'today'));
	}

	public function content($slug)
	{
		if ($slug == 'main-news') {
			$contentName = 'प्रमुख समाचार';
			$contentNews = News::where('highlighted_news', 1)
				->where('status', 1)
				->orderBy('published_date', 'DESC')
				->paginate(12);
		} else if ($slug == 'latest-update') {
			$contentName = 'ताजा उपडेट';
			$contentNews = News::where('status', 1)
				->orderBy('published_date', 'DESC')
				->paginate(12);
		} else if ($slug == 'popular') {
			$contentName = 'लोकप्रिय';
			$contentNews = News::where('status', 1)
				->orderBy('view_count', 'DESC')
				->paginate(12);
		} else if ($slug == 'left-out-news') {
			$contentName = 'छुटाउनुभयो कि?';
			$contentNews = News::orderBy('view_count', 'ASC')
				->paginate(12);
		}

		$today = date('Y-m-d H:i:s');
		$ads = Advertisement::where('section', 'category')->get();

		return view('frontend.content', compact('contentName', 'contentNews', 'today', 'ads'));
	}

	public function trend($slug)
	{
		$trend = Trend::with(['news'])
			->where('slug', $slug)
			->first();

		$trendNews = $trend->news()->paginate(24);
		$today = date('Y-m-d H:i:s');
		$ads = Advertisement::where('section', 'category')->get();

		// dd($trendNews);
		return view('frontend.trend', compact('trend','trendNews', 'ads', 'today'));
	}
}
