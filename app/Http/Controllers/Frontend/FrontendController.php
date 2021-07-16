<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\ChooseCategory;
use App\Models\Page;
use App\Models\Team\TeamCategory;
use App\Models\Seo;

class FrontendController extends Controller
{
    public function command()
    {
        // dd(shell_exec('cd /home4/khabarukam/public_html && COMPOSER_HOME="mytempdir/" php composer.phar install --optimize-autoloader --no-dev'));    
        // dd(shell_exec('cd /home4/khabarukam/public_html && php artisan config:cache'));
        // dd(shell_exec('cd /home4/khabarukam/public_html && php artisan route:cache'));   
        // dd(shell_exec('cd /home4/khabarukam/public_html && php artisan view:clear'));
        
    }
    
	public function index()
	{
		$today = date('Y-m-d H:i:s');

		$breakingNews = News::with('author', 'categories')->where('top_news', 1)->where('status', 1)->orderBy('published_date', 'DESC')->limit(4)->get();
		$highlightedNews = News::with('author')->where('highlighted_news', 1)->where('status', 1)->orderBy('published_date', 'DESC')->limit(3)->get();
		$latestNews = News::where('status', 1)->orderBy('published_date', 'DESC')->limit(8)->get();

		$oneWeekBefore = date('Y-m-d H:i:s', strtotime('-7 day', strtotime($today)));
		$trendingNews = News::where('published_date', '<=', $today)
												->where('published_date', '>=', $oneWeekBefore)
												->where('status', 1)
												->orderBy('view_count', 'DESC')
												->limit(6)
												->get();

		$politics = News::join('news_categories', 'news.id', 'news_categories.news_id')
										->join('categories', 'news_categories.category_id', 'categories.id')
										->join('authors', 'news.author_id', 'authors.id')
										->where('categories.slug', 'politics')
										->where('news.status', 1)
										->orderBy('news.published_date', 'DESC')
										->select('news.*', 'authors.name as author_name')
										->distinct()
										->limit(7)
										->get();

		$susaasan = News::join('news_categories', 'news.id', 'news_categories.news_id')
										->join('categories', 'news_categories.category_id', 'categories.id')
										->where('categories.slug', 'good-governance')
										->where('categories.status', 1)
										->where('news.status', 1)
										->orderBy('news.published_date', 'DESC')
										->select('news.*')
										->distinct()
										->limit(4)
										->get();

		$samaj = News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->join('authors', 'news.author_id', 'authors.id')
									->where('categories.slug', 'society')
									->where('categories.status', 1)
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*', 'authors.name as author_name')
									->distinct()
									->limit(7)
									->get();

		$subaltern = News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->where('categories.slug', 'subaltern')
									->where('categories.status', 1)
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*')
									->distinct()
									->limit(4)
									->get();

		$art = News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->join('authors', 'news.author_id', 'authors.id')
									->where('categories.slug', 'art')
									->where('categories.status', 1)
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*', 'authors.name as author_name')
									->distinct()
									->limit(7)
									->get();

		$economyAndBusiness = News::join('news_categories', 'news.id', 'news_categories.news_id')
															->join('categories', 'news_categories.category_id', 'categories.id')
															->join('authors', 'news.author_id', 'authors.id')
															->where('categories.slug', 'economy')
															->where('news.status', 1)
															->orderBy('news.published_date', 'DESC')
															->select('news.*', 'authors.name as author_name')
															->distinct()
															->limit(5)
															->get();

		$security = News::join('news_categories', 'news.id', 'news_categories.news_id')
										->join('categories', 'news_categories.category_id', 'categories.id')
										->join('authors', 'news.author_id', 'authors.id')
										->where('categories.slug', 'security')
										->where('news.status', 1)
										->orderBy('news.published_date', 'DESC')
										->select('news.*', 'authors.name as author_name')
										->distinct()
										->limit(7)
										->get();

		$lokpriya = News::where('status', 1)
										->orderBy('view_count', 'DESC')
										->limit(6)
										->get();

		$provinceCategory = Category::with([
											'subCategories' => function($query){
												$query->where('status', 1)->orderBy('list_order', 'ASC');
											}, 
											'subCategories.news' => function($q){
												$q->where('status', 1)->orderBy('published_date', 'DESC')->limit(40);
											}, 'subCategories.news.author'
											])
											->where('slug', 'province')
											->first();

		$localGovernance = Category::with([
												'subCategories' => function($query){
													$query->where('status', 1)->orderBy('list_order', 'ASC');
												}, 
												'subCategories.news' => function($q){
													$q->where('status', 1)->orderBy('published_date', 'DESC')->limit(40);
												}, 'subCategories.news.author'
												])
												->where('slug', 'local-governance')
												->first();

		$foreign = News::join('news_categories', 'news.id', 'news_categories.news_id')
										->join('categories', 'news_categories.category_id', 'categories.id')
										->where('categories.slug', 'foreign')
										->where('categories.status', 1)
										->where('news.status', 1)
										->orderBy('news.published_date', 'DESC')
										->select('news.*')
										->distinct()
										->limit(4)
										->get();

		$bichar = News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->where('categories.slug', 'opinion')
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*')
									->distinct()
									->limit(4)
									->get();

		$sports = News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->join('authors', 'news.author_id', 'authors.id')
									->where('categories.slug', 'sports')
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*', 'authors.name as author_name')
									->distinct()
									->limit(3)
									->get();

		$technology = News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->where('categories.slug', 'technology')
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*')
									->distinct()
									->limit(4)
									->get();

		$video =  News::join('news_categories', 'news.id', 'news_categories.news_id')
									->join('categories', 'news_categories.category_id', 'categories.id')
									->where('categories.slug', 'video')
									->where('news.status', 1)
									->orderBy('news.published_date', 'DESC')
									->select('news.*')
									->distinct()
									->limit(8)
									->get();

		$entertainment = News::join('news_categories', 'news.id', 'news_categories.news_id')
											->join('categories', 'news_categories.category_id', 'categories.id')
											->where('categories.slug', 'entertainment')
											->where('news.status', 1)
											->orderBy('news.published_date', 'DESC')
											->select('news.*')
											->distinct()
											->limit(4)
											->get();

		$featuredNews = News::join('news_categories', 'news.id', 'news_categories.news_id')
												->join('categories', 'news_categories.category_id', 'categories.id')
												->where('categories.slug', 'featured-news')
												->where('news.status', 1)
												->orderBy('news.published_date', 'DESC')
												->select('news.*')
												->distinct()
												->limit(5)
												->get();
												
        $samachar = News::join('news_categories', 'news.id', 'news_categories.news_id')
    					->join('categories', 'news_categories.category_id', 'categories.id')
    					->where('categories.slug', 'news')
    					->where('categories.status', 1)
    					->where('news.status', 1)
    					->orderBy('news.published_date', 'DESC')
    					->select('news.*')
    					->distinct()
    					->limit(4)
    					->get();

		$datas = array();
		$chooseCategory = ChooseCategory::all();

		foreach ($chooseCategory as $index => $category){
			if (!is_null($category->value)){
				$datas['data'][] = News::join('news_categories', 'news.id', 'news_categories.news_id')
															->join('categories', 'news_categories.category_id', 'categories.id')
															->where('categories.id', $category->value)
															->where('news.status', 1)
															->orderBy('news.published_date', 'DESC')
															->select('news.*', 'categories.title_np as category_name', 'categories.slug as category_slug')
															->distinct()
															->limit(4)
															->get();
			}
		}

		$ads = Advertisement::where('section', 'home')->get();

		// dd($ads);
		$homepageSeo = Seo::where('section', 'homepage-seo')->first();

		return view('frontend.index', compact('breakingNews', 'highlightedNews', 'latestNews', 'trendingNews', 'politics',
		 'susaasan', 'samaj', 'localGovernance', 'subaltern', 'art', 'foreign', 'economyAndBusiness', 'lokpriya', 'security', 'provinceCategory', 'bichar', 'sports', 'technology', 'entertainment',
		  'featuredNews', 'latestNews', 'datas', 'ads', 'video', 'homepageSeo', 'today', 'samachar'));
	}

	public function search(Request $request)
	{
		$searchedKeyword = $request['keywords'];
		$keywords = explode(' ', $request['keywords']);

		$searchedNews = News::orWhere(function($q) use ($keywords) {
										foreach( $keywords as $keyword )
											$q->orWhere('title', 'LIKE', '%'. $keyword . '%');
									})
								
									->orWhere(function($q) use ($keywords) {
										foreach( $keywords as $keyword )
											$q->orWhere('caption', 'LIKE', '%'. $keyword . '%');
									})

									->orWhere(function($q) use ($keywords) {
										foreach( $keywords as $keyword )
											$q->orWhere('description', 'LIKE', '%'. $keyword . '%');
									})

									->paginate(9);

		// $today = date('Y-m-d H:i:s');
		// $ads = Advertisement::where('section', 'home')
		// 										->where('publish_date', '<=', $today)
		// 										->where('end_date', '>=', $today)
		// 										->where('status', 1)
		// 										->get();

		return view('frontend.search', compact('searchedKeyword', 'searchedNews'));
	}

	public function getPage($slug='')
	{
		$page = Page::where('slug', $slug)->first();
		
		if (empty($page)){
			return redirect()->route('frontend.home');
		}

		// $today = date('Y-m-d H:i:s');
		// $ads = Advertisement::where('section', 'home')
		// 										->where('publish_date', '<=', $today)
		// 										->where('end_date', '>=', $today)
		// 										->where('status', 1)
		// 										->get();

		return view('frontend.page', compact('page'));
	}
	
	public function team()
	{
		$teamCategories = TeamCategory::with(['team' => function($q){
																				$q->orderBy('order', 'ASC');
																		}])	

																	->orderBy('order', 'ASC')
																	->get();

																	// dd($teamCategories);

		return view('frontend.team', compact('teamCategories'));
	}

	public function unicode()
	{
		return view('frontend.unicode');
	}
}
