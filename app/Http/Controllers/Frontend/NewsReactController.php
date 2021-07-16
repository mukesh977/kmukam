<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsReactEmoji;

class NewsReactController extends Controller
{
	public function getNewsReact($id)
	{
		$newsReact = NewsReactEmoji::where('news_id', $id)->first();
		$love = $newsReact->love;
		$wow = $newsReact->wow;
		$liked = $newsReact->liked;
		$laugh = $newsReact->laugh;
		$sad = $newsReact->sad;
		$angry = $newsReact->angry;

		$total = $love + $wow + $liked + $laugh + $sad + $angry;

		if ($total != 0) {
			$lovePercent = round(($love / $total) * 100);
			$wowPercent = round(($wow / $total) * 100);
			$likedPercent = round(($liked / $total) * 100);
			$laughPercent = round(($laugh / $total) * 100);
			$sadPercent = round(($sad / $total) * 100);
			$angryPercent = round(($angry / $total) * 100);
		} else {
			$lovePercent = 0;
			$wowPercent = 0;
			$likedPercent = 0;
			$laughPercent = 0;
			$sadPercent = 0;
			$angryPercent = 0;
		}

		$data = array(
			'lovePercent' => $lovePercent . ' %',
			'wowPercent' => $wowPercent . ' %',
			'likedPercent' => $likedPercent . ' %',
			'laughPercent' => $laughPercent . ' %',
			'sadPercent' => $sadPercent . ' %',
			'angryPercent' => $angryPercent . ' %',
		);

		return $data;
	}

	public function react(Request $request)
	{
		if ($request->ajax()) {
			$column = $request['react'];
			NewsReactEmoji::where('news_id', $request['newsId'])->increment($column);
			$newsReactDetail = NewsReactEmoji::where('news_id', $request['newsId'])->first();
			return response()->json($newsReactDetail);
		}

	}
}
