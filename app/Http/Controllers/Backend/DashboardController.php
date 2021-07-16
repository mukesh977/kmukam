<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Author;
use App\User;

class DashboardController extends Controller
{
  public function __construct()
  {
    return $this->middleware('auth');
  }

  public function index()
  {
    $noOfNewsCategory = Category::where('parent_id', null)->where('status', 1)->count();
    $noOfNews = News::where('status', 1)->count();
    $noOfUsers = User::count();
    $noOfAuthors = Author::where('status', 1)->count();

    return view('backend.dashboard', compact('noOfNewsCategory', 'noOfNews', 'noOfUsers', 'noOfAuthors'));
  }
}
