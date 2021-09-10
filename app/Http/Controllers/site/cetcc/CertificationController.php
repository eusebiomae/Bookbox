<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\SlideModel;
use App\Model\api\CertificationModel;
use App\Model\api\Configuration\ContentPageModel;


class CertificationController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');
		new CertificationModel;
		$certification = CertificationModel::get();

		// for ($i = 0, $ii = count($certification); $i < $ii; $i++) {
		// 		$item = $certification[$i];

		// $certification[$item->function->title_pt][] = $item;
		// $certification[$item->function->description_pt][] = $item;

		// };

		// $certificationMapData = [
		// 	'Fundadores' => [],
		// 	'Co-fundadores' => [],
		// ];

		// for ($i = 0, $ii = count($certification); $i < $ii; $i++) {
		// 	$item = $certification[$i];

		// 	$certificationMapData[$item->function->description_pt][] = $item;
		// }

		// return $certification;

		return view('site/cetcc/pages/default')
		->with('flgPage', $flgPage)
		// ->with('certificationMapData', $certificationMapData)
		->with('banner', SlideModel::whereHas('contentPage', function($query) use ($flgPage) {
			$query->where('flg_page', $flgPage);
		})->first())
		->with('pageComponents', ContentPageModel::getByComponent($flgPage))
		->with('certification', $certification)
		->with('footerLinks', $this->generateFooterLinks());
	}
}
