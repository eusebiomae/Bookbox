<?php

namespace App\Http\Controllers\Admin\Prospection\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\AdditionalModel;
use App\Model\api\CourseBonusCourseModel;
use App\Model\api\CourseFormPaymentModel;
use App\Model\api\CourseTeacherModel;
use App\Model\api\FormPaymentModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Configuration\FunctionModel;
use App\Model\api\Configuration\GraduationModel;
use App\Model\api\Configuration\OfficeModel;
use App\Model\api\ContactCourseModel;
use App\Model\api\CourseAdditionalModel;
use App\Model\api\CourseDiscountModel;
use App\Model\api\CourseIncludedItemsModel;
use App\Model\api\PlaceModel;
use App\Model\api\Prospection\BonusCourseModel;
use App\Model\api\CourseModuleModel;
use App\Model\api\CourseOtherInfModel;
use App\Model\api\DiscountModel;
use App\Model\api\OtherInfTypeModel;
use App\Model\api\Prospection\ClassModel;
use App\Model\api\Prospection\ContentCourseModel;
use App\Model\api\Prospection\IncludedItemsModel;
use App\Model\api\TeamModel;
use App\Model\api\UserModel;

class CourseController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'course';

		$this->pathFile = 'storage/course';
		$this->apiModel = new CourseModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/course',
			'urlAction' => 'admin/prospection/course',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Cursos',
				'url_group' => '#',
				'module_page' => 'curso',
				'url_page' => 'admin/prospection/course',
				'pathFile' => $this->pathFile,
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->courseCategory = CourseCategoryModel::orderBy('description_pt')->get();
		$list->place = PlaceModel::orderBy('description')->get();
		$list->team = TeamModel::orderBy('name')->get();
		$list->courseCategoryType = CourseCategoryTypeModel::orderBy('title')->get();
		// $list->courseSubcategory = CourseSubcategoryModel::orderBy('description_pt')->get();
		$list->formPayment = FormPaymentModel::orderBy('description')->get();
		$list->bonusCourse = BonusCourseModel::orderBy('title_pt')->get();
		$list->includedItems = IncludedItemsModel::orderBy('title_pt')->get();
		$list->function = FunctionModel::orderBy('description_pt')->get();
		$list->graduation = GraduationModel::orderBy('description_pt')->get();
		$list->office = OfficeModel::orderBy('description_pt')->get();
		$list->contact = UserModel::where('contact_site', 'S')->orderBy('name')->get();
		$list->otherInfType = OtherInfTypeModel::whereHas('otherInf')->with([
			'otherInf',
		])->orderBy('description_pt')->get();

		$list->contentCourse = ContentCourseModel::with([
			'courseCategory' => function($query) {
				$query->select(['course_category.id']);
			},
		])->orderBy('title_pt')->get();

		$list->additional = AdditionalModel::orderBy('title')->get();
		$list->discount = DiscountModel::orderBy('title')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$listSelectBox = $this->getListSelectBox();

		$dataTable = new \stdClass();
		$dataTable->data = CourseModel::withTrashed()
			->with('courseCategory')
			->with('courseCategoryType')
			// ->with('courseSubcategory')
			->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			// (object) [
			// 	'label' => 'Tipo',
			// 	'column' => 'courseCategoryType.title',
			// ],
			// (object) [
			// 	'label' => 'Categoria',
			// 	'column' => 'courseCategory.description_pt',
			// ],
			// (object) [
			// 	'label' => 'Subcategoria',
			// 	'column' => 'courseSubcategory.description_pt',
			// ],
			(object) [
				'label' => 'Titulo',
				'column' => 'title_pt',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request)
		->with('listSelectBox', $listSelectBox);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Ficha cadastral do Produto';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao Produto em um único lugar.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox())
		->with('payload', (object) [
			'bonusCourse' => [],
			'teacher' => [],
			'courseModule' => [],
			'courseFormPayment' => [],
			'courseAdditional' => [],
			'contact' => [],
		]);
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Ficha de edição do Produto';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao Produto em um único lugar.';

		$listSelectBox = $this->getListSelectBox();

		$view = parent::update($request);

		return $view->with('listSelectBox', $listSelectBox)
			->with('payload', (object) [
				'courseOtherInfType' => CourseOtherInfModel::where('course_id', $view->data['id'])->get(),
				'contactCourse' => ContactCourseModel::where('course_id', $view->data['id'])->get(),
				'includedItems' => CourseIncludedItemsModel::where('course_id', $view->data['id'])->get(),
				'bonusCourse' => CourseBonusCourseModel::where('course_id', $view->data['id'])->get(),
				'teacher' => CourseTeacherModel::where('course_id', $view->data['id'])->orderBy('description')->get(),
				'courseModule' => CourseModuleModel::where('course_id', $view->data['id'])->whereNull('class_id')->orderBy('sequence')->get(),
				'courseFormPayment' => CourseFormPaymentModel::where('course_id', $view->data['id'])->orderBy('id')->get(),
				'courseAdditional' => CourseAdditionalModel::select('course_additional.*')
					->where('course_additional.course_id', $view->data['id'])
					->join('additional', 'additional.id', 'course_additional.additional_id')
					->orderBy('additional.title')
					->orderBy('course_additional.form_payment_id')
					->orderBy('course_additional.parcel')
					->get(),
				'courseDiscount' => CourseDiscountModel::with([ 'discount' ])->where('course_id', $view->data['id'])->whereHas('discount')->orderBy('id')->get(),
				'class' => [
					'data' => ClassModel::with([ 'city' ])->where('course_id', $view->data['id'])->orderBy('name')->get(),
					'header' => [
						[ 'title' => 'ID', 'data' => 'id', ],
						[ 'title' => 'Nome', 'data' => 'name', ],
						[ 'title' => 'Cidade', 'data' => 'city.name', ],
						[ 'title' => 'Data Início', 'data' => 'start_date', ],
						[ 'title' => 'Data prevista de finalização', 'data' => 'end_date', ],
						[
							'title' => 'Editar',
							'className' => 'center',
							'width' => '100px',
							'btnUpd' => '/admin/prospection/class',
						],
					]
				]
			]);
	}

	public function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		// return CourseModel::with('courseModule')->find($request->get('id'));

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move($this->pathFile, $fileName);
			$request['img'] = $fileName;
		}

		if (!$request->get('show_home')) {
			$request['show_home'] = null;
		}

		if (!$request->get('inactive')) {
			$request['inactive'] = null;
		}

		if (!$request->get('show_title')) {
			$request['show_title'] = null;
		}

		if (!$request->get('school_clinic')) {
			$request['school_clinic'] = null;
		}

		if (!$request->get('formPayment')) {
			$request['full_value'] = null;
		}

		// return $request;
		// return $request->get('full_value');
		// return toNumberFormat($request->get('fine_value'));

		$save = parent::save($request);

		// cetcc
		// if (empty($request->get('id'))) {
		// 	$courseFormPayment = CourseFormPaymentModel::whereNull('course_id')->where('course_subcategory_id',  $request->get('course_subcategory_id'))->get()->toArray();

		// 	foreach ($courseFormPayment as &$value) {
		// 		$value['date'] = formatDateEng($value['date']);

		// 		unset($value['id'], $value['course_id']);
		// 	}

		// 	$save->data->formPayment()->sync($courseFormPayment);
		// }

		$formPayment = $request->get('formPayment');
		if (!empty($formPayment)) {
			$courseFormPaymentIds = [];

			foreach ($formPayment as $key => &$value) {
				if (empty($value['form_payment_id'])) {
					unset($formPayment[$key]);
					continue;
				}

				$value['course_id'] = $save->data->id;

				if (empty($value['id'])) {
					unset($value['id']);

					$courseFormPaymentModel = new CourseFormPaymentModel;
				} else {
					$courseFormPaymentModel = CourseFormPaymentModel::find($value['id']);
				}

				$courseFormPaymentModel->fill($value)->save();

				$courseFormPaymentIds[] = $courseFormPaymentModel->id;
			}

			if (count($courseFormPaymentIds)) {
				CourseFormPaymentModel::where('course_id', $save->data->id)->whereNotIn('id', $courseFormPaymentIds)->delete();
			}
		}

		$courseOtherInfType = [];
		if ($request->get('course_other_inf')) {

			foreach($request->get('course_other_inf') as $otherInfTypeId => $otherInfIds) {
				if (!count($otherInfIds)) {
					continue;
				}

				foreach($otherInfIds as $otherInfId) {
					$courseOtherInfType[] = [
						'other_inf_type_id' => $otherInfTypeId,
						'other_inf_id' => $otherInfId,
					];
				}
			}
		}

		$save->data->includedItems()->sync($request->get('includedItems'));
		$save->data->bonusCourse()->sync($request->get('bonusCourse'));
		CourseOtherInfModel::where('course_id', $save->data->id)->forceDelete();
		$save->data->otherInf()->sync($courseOtherInfType);
		$save->data->user()->sync($request->get('contact_course'));

		$teacher = $request->get('teacher');
		if (!empty($teacher)) {
			foreach ($teacher as $key => &$value) {
				if (empty($value['team_id'])) {
					unset($teacher[$key]);
					continue;
				}

				if (empty($value['id'])) {
					unset($value['id']);
				}
			}
		}
		$save->data->teacher()->sync($teacher);

		$module = $request->get('module');
		CourseModuleModel::where('course_id', $save->data->id)->delete();
		if (!empty($module)) {
			foreach ($module as $key => &$value) {
				if (empty($value['content_course_id'])) {
					unset($module[$key]);
					continue;
				}

				$value['course_id'] = $save->data->id;

				if (empty($value['id'])) {
					unset($value['id']);
				}

				(new CourseModuleModel)->fill($value)->save();
			}
		}

		$additional = $request->get('additional');

		$courseId = $save->data->id;
		if (empty($additional)) {
			CourseAdditionalModel::where('course_id', $courseId)->delete();
		} else {
			$additionalIds = [];
			foreach ($additional as $key => &$value) {
				if (empty($value['additional_id'])) {
					continue;
				}

				if (empty($value['id'])) {
					unset($value['id']);
					$courseAdditionalModel = new CourseAdditionalModel;
				} else {
					$courseAdditionalModel = CourseAdditionalModel::find($value['id']);

					if (!$courseAdditionalModel) {
						$courseAdditionalModel = new CourseAdditionalModel;
					}
				}

				$value['course_id'] = $courseId;

				$courseAdditionalModel->fill($value)->save();
				$additionalIds[] = $courseAdditionalModel->id;
			}

			if (count($additionalIds)) {
				CourseAdditionalModel::where('course_id', $courseId)->whereNotIn('id', $additionalIds)->delete();
			}
		}

		$discount = $request->get('discount');

		$courseId = $save->data->id;
		if (empty($discount)) {
			CourseDiscountModel::where('course_id', $courseId)->delete();
		} else {
			$discountIds = [];
			foreach ($discount as $key => &$value) {
				if (empty($value['discount_id'])) {
					continue;
				}

				if (empty($value['id'])) {
					unset($value['id']);
					$courseAdditionalModel = new CourseDiscountModel;
				} else {
					$courseAdditionalModel = CourseDiscountModel::find($value['id']);

					if (!$courseAdditionalModel) {
						$courseAdditionalModel = new CourseDiscountModel;
					}
				}

				$value['course_id'] = $courseId;

				$courseAdditionalModel->fill($value)->save();
				$discountIds[] = $courseAdditionalModel->id;
			}

			if (count($discountIds)) {
				CourseDiscountModel::where('course_id', $courseId)->whereNotIn('id', $discountIds)->delete();
			}
		}

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

	public function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		if (ClassModel::where('course_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar esse curso, pois existe turma ativa vinculada ao mesmo',
				'confirmButtonColor' => '#DD6B55',
			];
		} else {
			$data = $this->apiModel::find($id);

			if ($data) {
				$data->delete();
			}
		}

		return redirect()->back()->withInput($withInput);
	}

}
