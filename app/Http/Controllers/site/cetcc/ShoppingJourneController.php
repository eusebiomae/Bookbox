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

		$payload = (object) [
			'student' => Auth::guard('studentArea')->user(),
			'states' => StateModel::orderBy('abbreviation')->get(),
		];

		if ($request->has('supervision')) {
			$payload->supervision = CourseSupervisionModel::with([ 'course', 'teacher' ])
			->whereRaw('date >= CURRENT_DATE()')
			->orderBy('date')
			->get();
		} if ($request->has('scholarship')) {
			$payload->scholarship = ScholarshipModel::where('id', $request['scholarship'])
			->with([
				'scholarshipDiscount' => function($query){
					$query->orderBy('discount_percentage', 'desc');
				},
				'courseCategory',
				'courseCategoryType',
				// 'courseSubcategory',
			])->first();

			$payload->minimum_wage = ParametersAppModel::first()->minimum_wage;

			$payload->studentSocioeconomic = $payload->student ? StudentSocioeconomicModel::where('student_id', $payload->student->id)->first() : new stdClass;
		} else {
			$payload->categoryType = CourseCategoryTypeModel::orderBy('title')->get();
			$payload->category = CourseCategoryModel::orderBy('description_pt')->get();
			// $payload->subCategory = CourseSubcategoryModel::orderBy('description_pt')->get();
			$payload->courses = CourseModel::with([
				'courseCategory',
				'courseCategoryType',
				// 'courseSubcategory',
				'class' => function($query) {
					$query->where('does_registre', '1');
				},
				'courseFormPayment' => function($query) {
					$query->with([
						'formPayment.introduction',
						'formPayment.bankAccount.bank',
					])
					->where('date', function($query) {
						$query->select('date')
							->from('course_form_payment', 'cfp')
							->whereRaw('cfp.course_id = course_form_payment.course_id')
							->where('date', '>=', now())
							->groupBy('date')
							->orderBy('date')
							->limit(1);
					})
					->orderBy('value', 'desc');
				},
				'courseAdditional' => function($query) {
					$query->select([ 'course_additional.*', 'additional.title' ]);
					$query->with([ 'formPayment' ]);
					$query->join('additional', 'additional.id', '=', 'course_additional.additional_id');
					$query->orderBy('additional.title', 'asc');
				},
				'courseDiscount.discount',
			])->orderBy('title_pt')->get();

			if ($request->has('scholarshipStudent')) {
				$payload->courseScholarship = ScholarshipStudentModel::find($request['scholarshipStudent']);
			}
		}

		return view('site/bookbox/pages/box_blog')
			->with('payload', $payload)
			->with('flgPage', $flgPage)
			->with('banner', SlideModel::whereHas('contentPage', function($query) use ($flgPage) {
				$query->where('flg_page', $flgPage);
			})->first())
			->with('pageComponents', ContentPageModel::getByComponent($flgPage))
			->with('footerLinks', $this->generateFooterLinks());
	}
}
