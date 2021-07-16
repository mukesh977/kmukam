<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\News;

class AuthorController extends Controller
{
	public function getAuthorDetail($id)
	{
		$author = Author::with('socialMedia')
										->where('id', $id)
										->where('status', 1)
										->first();

		$news = News::where('author_id', $author->id)
								->where('status', 1)
								->orderBy('published_date', 'DESC')
								->paginate(9);
									
		return view('frontend.author', compact('author', 'news'));
	}
}
