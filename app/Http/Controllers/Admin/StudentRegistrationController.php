<?php
namespace App\Http\Controllers\Admin;

use App\Model\api\Configuration\StateModel;
use App\Model\api\CourseSupervisionModel;
use App\Model\api\FormPaymentModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\CourseSubcategoryModel;
use App\Model\api\UserModel;
use Illuminate\Http\Request;

class StudentRegistrationController extends \App\Http\Controllers\Controller {
	function __construct() {
		$this->pageKey = 'studentRegistration';
	}

	public function index(Request $request) {
		return view('admin.studentRegistration.view')
		->with('payload', [
			'responsible' => UserModel::orderBy('name')->get(),
			'states' => StateModel::orderBy('abbreviation')->get(),
			'categoryType' => CourseCategoryTypeModel::orderBy('title')->get(),
			'category' => CourseCategoryModel::orderBy('description_pt')->get(),
			'subCategory' => CourseSubcategoryModel::orderBy('description_pt')->get(),
			'formPayment' => FormPaymentModel::with([ 'introduction', 'bankAccount.bank' ])->orderBy('description')->get(),
			'courses' => CourseModel::with([
				'courseCategory',
				'courseCategoryType',
				'courseSubcategory',
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
			])->orderBy('title_pt')->get(),
			'supervision' => CourseSupervisionModel::with([ 'course', 'teacher' ])
			->whereRaw('date >= CURRENT_DATE()')
			->orderBy('date')
			->get()
		]);
	}
}
