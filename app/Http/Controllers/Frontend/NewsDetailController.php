<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\News;

class NewsDetailController extends Controller
{
	public function index($y='', $m='', $d='', $id='', Request $request)
	{
		$date = date('Y-m-d', strtotime($y .'-'. $m .'-'. $d));

		if ($request->session()->has('news'. $id)){
			if ((time() - $request->session()->get('news'. $id)) > 1200){
				$request->session()->forget('news'. $id);
				$request->session()->put('news'. $id, time());
				
				//counting views of news
				News::where('id', $id)->where('published_date', 'LIKE', '%'. $date .'%')->increment('view_count');
			}
		}
		else{
			$request->session()->put('news'. $id, time());
			
			//counting views of news
			News::where('id', $id)->where('published_date', 'LIKE', '%'. $date .'%')->increment('view_count');
		}

		$news = News::with('categories', 'author', 'trends')
								->where('id', $id)
								->where('published_date', 'LIKE', '%'. $date .'%')
								->first();
								
		if (empty($news)){
			return redirect()->route('frontend.home');
		}

		$categories = array();
		foreach ($news->categories as $category){
			$categories[] = $category->id;
		}

		$relatedNews = News::join('news_categories', 'news.id', 'news_categories.news_id')
												->join('categories', 'news_categories.category_id', 'categories.id')
												->whereIn('categories.id', $categories)
												->where('news.id', '!=', $news->id)
												->where('news.status', 1)
												->where('categories.status', 1)
												->orderBy('news.published_date', 'DESC')
												->select('news.*')
												->inRandomOrder()
												->distinct()
												->limit(6)
												->get();

		$today = date('Y-m-d H:i:s');
		$ads = Advertisement::where('section', 'news-detail')->get();

		$newsReactController = new \App\Http\Controllers\Frontend\NewsReactController();
		$newsReact = $newsReactController->getNewsReact($news->id);

		$latestNews = News::where('status', 1)->orderBy('published_date', 'DESC')->limit(8)->get();
		$lowViewedNews = News::orderBy('view_count', 'ASC')->limit(9)->get();

		return view('frontend.news', compact('news', 'relatedNews', 'newsReact', 'newsReactController', 'latestNews',
		 'lowViewedNews', 'today', 'ads'));
	}
}
