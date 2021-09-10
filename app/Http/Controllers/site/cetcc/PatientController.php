<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Configuration\StateModel;
use App\Model\api\PatientModel;
use App\Model\api\SchoolInformationModel;
use App\Model\api\SlideModel;

class PatientController extends _Controller
{
	private function getListSelectBox()
	{
		$list = [];

		$list['state'] = StateModel::all();

		return $list;
	}

	public function add(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$listSelectBox = $this->getListSelectBox();

		// return ContentPageModel::getByComponent($flgPage);
		return view('site/cetcc/pages/default')
			->with('listSelectBox', $listSelectBox)
			->with('flgPage', $flgPage)
			->with('banner', SlideModel::whereHas('contentPage', function($query) use ($flgPage) {
				$query->where('flg_page', $flgPage);
			})->first())
			->with('pageComponents', ContentPageModel::getByComponent($flgPage))
			->with('footerLinks', $this->generateFooterLinks());
	}

	public function save(Request $request)
	{
		$patient = new PatientModel();
		$patient->fill($request->all())->save();

		return redirect()->back()->withInput(['savedSuccessfully' => 1]);
	}
}
