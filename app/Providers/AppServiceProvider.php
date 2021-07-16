<?php

namespace App\Providers;

use App\Models\Advertisement;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Page;
use App\Models\Trend;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['frontend.includes.header', 'frontend.index', 'frontend.includes.footer'], function ($view) {
            $setting = Setting::with('socialMedia', 'advertisementContact','advertisementEmail')->where('company', 'self')->first();
            $categories = Category::with('subCategories')->where('parent_id', null)->where('status', 1)->orderBy('list_order', 'ASC')->get();
            $pages = Page::orderBy('id', 'ASC')->get();
            $trends_com = Trend::where('status', 1)->orderBy('order', 'asc')->limit(10)->get();
            $above_logo_ad = Advertisement::where('slug', 'above-logo')->first();
            $popop_ad = Advertisement::where('slug', 'popup')->first();
            // dd($popop_ad);
            $view->with('setting', $setting)
            ->with('categories', $categories)
            ->with('trends_com', $trends_com)
            ->with('above_logo_ad', $above_logo_ad)
            ->with('popop_ad', $popop_ad)
            ->with('pages', $pages);
        }); 

    }
}
