<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\SchoolInformationModel;
use App\Model\api\SlideModel;
use App\Model\api\FeatureModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\BlogModel;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\TestemonialModel;
use App\Model\api\Configuration\ContentSectionModel;
use App\Model\api\ContentModel;
use App\Model\api\LinkFooterModel;
use App\Model\api\Prospection\CourseCategoryModel;

class HomeController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents);
	}
}
