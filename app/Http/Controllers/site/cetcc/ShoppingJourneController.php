<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\SlideModel;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Configuration\StateModel;
use App\Model\api\CourseSupervisionModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
// use App\Model\api\Prospection\CourseSubcategoryModel;
use App\Model\api\ScholarshipModel;
use App\Model\api\ScholarshipStudentModel;
use App\Model\api\StudentSocioeconomicModel;
use App\Model\ParametersAppModel;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ShoppingJourneController extends _Controller
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
