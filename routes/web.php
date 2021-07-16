<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/category/{slug}', 'Frontend\CategoryController@index')->name('frontend.category');
Route::get('/content/{slug}', 'Frontend\CategoryController@content')->name('frontend.content');
Route::get('/trend/{slug}', 'Frontend\CategoryController@trend')->name('frontend.trend');
Route::get('/news/{y}/{m}/{d}/{id}','Frontend\NewsDetailController@index')->name('frontend.news');
Route::get('/tag/{slug}', 'Frontend\FrontendController@tag')->name('frontend.tag');
Route::get('/search', 'Frontend\FrontendController@search')->name('frontend.search');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('contact', 'Frontend\FrontendController@sendContactMail')->name('frontend.contact.send-mail');
Route::get('team', 'Frontend\FrontendController@team')->name('frontend.team');
Route::get('author/{id}', 'Frontend\AuthorController@getAuthorDetail')->name('frontend.author');
Route::post('news/react', 'Frontend\NewsReactController@react')->name('news.react');
Route::get('unicode', 'Frontend\FrontendController@unicode')->name('frontend.unicode');
Route::get('command', 'Frontend\FrontendController@command');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('backend.')->namespace('Backend')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('category', 'CategoryController', ['except' => ['show']]);
    Route::delete('media-library', 'MediaLibraryController@bulkDestroy')->name('media-library.bulk-delete');
    Route::get('media-library/search', 'MediaLibraryController@search')->name('media-library.search');
    Route::get('ajax/images', 'MediaLibraryController@showImages')->name('ajax.images');
    Route::resource('media-library', 'MediaLibraryController', ['excpet' => ['show', 'edit', 'update', 'destroy']]);
    Route::delete('ad-media-library', 'AdMediaLibraryController@bulkDestroy')->name('ad-media-library.bulk-delete');
    Route::resource('ad-media-library', 'AdMediaLibraryController', ['excpet' => ['show', 'edit', 'update', 'destroy']]);
    Route::resource('author', 'AuthorController', ['except' => ['show']]);
    Route::resource('news', 'NewsController');
    Route::resource('home-advertisement', 'AdvertisementHomeController', ['except' => ['create', 'store', 'show']]);
    Route::resource('category-advertisement', 'AdvertisementCategoryController', ['except' => ['create', 'store', 'show']]);
    Route::resource('news-detail-advertisement', 'AdvertisementNewsDetailController', ['except' => ['create', 'store', 'show']]);
    Route::get('choose-category', 'ChooseCategoryController@index')->name('choose-category.index');
    Route::post('choose-category', 'ChooseCategoryController@store')->name('choose-category.store');
    Route::resource('page', 'PageController', ['except' => ['show']]);
    Route::resource('setting', 'SettingController', ['only' => ['index', 'store']]);
    Route::resource('trend', 'TrendController');
    // Route::delete('team/category', 'Team\TeamCategoryController@destroy');
    Route::resource('team/category', 'Team\TeamCategoryController', ['names' => [
        'index' => 'team.category.index',
        'create' => 'team.category.create',
        'store' => 'team.category.store',
        'edit' => 'team.category.edit',
        'update' => 'team.category.update',
        'destroy' => 'team.category.destroy',
    ]]);
    Route::resource('team', 'Team\TeamController');
    Route::get('homepage/seo', 'Seo\SeoController@getHomePageSeo')->name('seo.homepage.index');
	Route::post('homepage/seo', 'Seo\SeoController@setHomePageSeo')->name('seo.homepage.store');
	Route::post('ckeditor/uploadImage', 'CKEditorController@uploadImage')->name('ckeditor.image.store');
});

Route::get('{slug}', 'Frontend\FrontendController@getPage')->name('frontend.page.show');
