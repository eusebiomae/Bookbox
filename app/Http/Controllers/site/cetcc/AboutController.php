<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\SchoolInformationModel;
use App\Model\api\SlideModel;
use App\Model\api\TeamModel;
use App\Model\api\Configuration\ContentPageModel;


class AboutController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$teams = TeamModel::select('id', 'name', 'image', 'graduation_id', 'function_id')->with([
			'graduation' => function ($query){
				$query->select('id', 'description_pt');
			},
			'function' => function ($query){
				$query->select('id', 'description_pt');
			}
		])->get();

		$teamMapData = [
			'Fundadores' => [],
			'Co-fundadores' => [],
		];

		for ($i = 0, $ii = count($teams); $i < $ii; $i++) {
			$item = $teams[$i];

			$teamMapData[$item->function->description_pt][] = $item;
		}

		return view('site/cetcc/pages/default')
		->with('flgPage', $flgPage)
		->with('teamMapData', $teamMapData)
		->with('banner', SlideModel::select('id', 'title_pt', 'image')->whereHas('contentPage', function($query) use ($flgPage) {
			$query->where('flg_page', $flgPage);
		})->first())
		->with('pageComponents', ContentPageModel::getByComponent($flgPage))
		->with('teams', $teams)
		->with('footerLinks', $this->generateFooterLinks());
	}
}
