<?php

namespace App\Http\Controllers\Admin\Prospection\ClassGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\AvaliationModel;
use App\Model\api\ClassesModel;
use App\Model\api\ClassTeacherModel;
use App\Model\api\Prospection\ClassModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Configuration\CityModel;
use App\Model\api\CourseDefaultValueModel;
use App\Model\api\CourseFormPaymentModel;
use App\Model\api\Configuration\StateModel;
use App\Model\api\TeamModel;
use App\Model\api\PlaceModel;
use App\Model\api\Configuration\FunctionModel;
use App\Model\api\Configuration\GraduationModel;
use App\Model\api\Configuration\OfficeModel;
use App\Model\api\ContractModel;
use App\Model\api\CourseModuleModel;
use App\Model\api\OrderModel;
use App\Model\api\PeriodicityModel;
use App\Model\api\Prospection\ContentCourseModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseSubcategoryModel;
use App\Model\api\Prospection\VideoModel;
use App\Utils\StudentClassControlUtils;

class ClassController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'class';

		$this->apiModel = new ClassModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/classGroup',
			'urlAction' => 'admin/prospection/class',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'TurmaS',
				'url_group' => '#',
				'module_page' => 'Turmas',
				'url_page' => 'admin/prospection/class',
			],
		];
	}

	private function getListSelectBox() {
		$list = new \stdClass();

		$list->courseCategoryType = CourseCategoryTypeModel::orderBy('title')->get();
		$list->courseCategory = CourseCategoryModel::orderBy('description_pt')->get();
		$list->courseSubcategory = CourseSubcategoryModel::orderBy('description_pt')->get();
		$list->city = CityModel::orderBy('name')->get();
		$list->team = TeamModel::orderBy('name')->get();
		$list->place = PlaceModel::orderBy('description')->get();
		$list->state = StateModel::orderBy('abbreviation')->get();
		$list->function = FunctionModel::orderBy('description_pt')->get();
		$list->graduation = GraduationModel::orderBy('description_pt')->get();
		$list->office = OfficeModel::orderBy('description_pt')->get();

		$list->contentCourse = ContentCourseModel::with([
			'courseCategory' => function($query) {
				$query->select(['course_category.id']);
			},
		])->orderBy('title_pt')->get();

		$list->avaliation = AvaliationModel::orderBy('title')->get();

		$list->video = VideoModel::orderBy('title')->get();
		$list->contract = ContractModel::where('status', 'current')->orderBy('title')->get();
		$list->periodicity = PeriodicityModel::get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$listSelectBox = $this->getListSelectBox();

		$dataTable = new \stdClass();
		$dataTable->data = ClassModel::withTrashed()->with('course')->with('city')->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Nome',
				'column' => 'name',
			],
			(object) [
				'label' => 'Cidade',
				'column' => 'city.name',
			],
			(object) [
				'label' => 'Curso',
				'column' => 'course.title_pt',
			],
			(object) [
				'label' => 'Data Início',
				'column' => 'start_date',
			],
			(object) [
				'label' => 'Data prevista de finalização',
				'column' => 'end_date',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		$view = parent::list($request)
		->with('listSelectBox', $listSelectBox);

		return $view;
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Ficha cadastral do Aluno';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao aluno em um único lugar.';

		$listSelectBox = $this->getListSelectBox();
		$listSelectBox->course = CourseModel::orderBy('title_pt')->get();

		return parent::insert($request)
		->with('listSelectBox', $listSelectBox)
		->with('payload', (object) [
			'courseDefaultValue' => [],
			'teacher' => [],
			'courseFormPayment' => [],
			'courseModule' => [],
			'avaliation' => [],
			'videoLessons' => [],
			'classes' => [],
		]);
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Ficha de edição do Aluno';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao aluno em um único lugar.';

		$listSelectBox = $this->getListSelectBox();
		$listSelectBox->course = CourseModel::with([ 'courseModule' ])->orderBy('title_pt')->get();

		$view = parent::update($request);

		// return ClassContentCourseModel::where('class_id', $view->data['id'])->with(['videoLesson'])->orderBy('id')->get();

		return $view
			->with('listSelectBox', $listSelectBox)
			->with('payload', (object) [
				'courseDefaultValue' => CourseDefaultValueModel::where('course_id', $view->data['course_id'])->where('class_id', $view->data['id'])->first(),
				'teacher' => ClassTeacherModel::with(['team'])->where('class_id', $view->data['id'])->orderBy('description')->get(),
				'courseFormPayment' => CourseFormPaymentModel::where('class_id', $view->data['id'])->orderBy('id')->get(),
				'courseModule' => CourseModuleModel::where('class_id', $view->data['id'])->whereNull('course_id')->orderBy('start_date')->orderBy('sequence')->get(),
				'avaliation' => AvaliationModel::where('class_id', $view->data['id'])->whereNull('course_id')->orderBy('title')->get(),
				'classes' => ClassesModel::with([ 'videoLesson', 'contentCourse', 'avaliation' ])->where('class_id', $view->data['id'])->orderBy('start_date')->orderBy('sequence')->get(),
			]);
	}

	public function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		// busca os dados antigos da turma para comparar se ouve alterações no curso
		$class = null;
		if ($request->get('id')) {
			$class = $this->apiModel->find($request->get('id'));
		}

		$save = parent::save($request);

		// altera o curso de todas as inscrições que dessa turma
		if ($class && $request->get('course_id') != $class->course_id) {
			OrderModel::where('class_id', $class->id)->update([
				'course_id' => $request->get('course_id'),
			]);
		}

		if ($request->get('course_default_value')) {
			$courseDefaultValue = CourseDefaultValueModel::where('course_id', $request->get('course_id'))->first();

			if (!$courseDefaultValue) {
				$courseDefaultValue = new CourseDefaultValueModel;
			}

			$courseDefaultValue->fill([
				'course_id' => $request->get('course_id'),
				'class_id' => $save->data->id,
			])->save();
		}

		$formPayment = $request->get('formPayment');
		if (empty($formPayment)) {
			$courseDefaultValue = CourseDefaultValueModel::with('courseFormPayment')->where('course_id', $request->get('course_id'))->first();

			if ($courseDefaultValue) {
				$formPayment = [];
				foreach ($courseDefaultValue->courseFormPayment as $courseFormPayment) {
					$formPayment[] = [
						'form_payment_id' => $courseFormPayment->form_payment_id,
						'value' => $courseFormPayment->value,
						'parcel' => $courseFormPayment->parcel,
						'flg_main' => $courseFormPayment->flg_main,
					];
				}
			}
		} else {

			foreach ($formPayment as $key => &$value) {
				if (empty($value['form_payment_id'])) {
					unset($formPayment[$key]);
					continue;
				}

				if (empty($value['id'])) {
					unset($value['id']);
				}
			}
		}
		$save->data->formPayment()->sync($formPayment);

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
		CourseModuleModel::where('class_id', $save->data->id)->delete();
		if (!empty($module)) {
			foreach ($module as $key => &$value) {
				if (empty($value['content_course_id']) && empty($value['avaliation_id'])) {
					unset($module[$key]);
					continue;
				}

				$value['class_id'] = $save->data->id;

				if (empty($value['id'])) {
					unset($value['id']);
				}

				(new CourseModuleModel)->fill($value)->save();
			}
		}

		/*
		$classes = $request->get('classes');
		if (empty($classes)) {
			ClassesModel::where('class_id', $save->data->id)->delete();
		} else {
			$classIds = [];
			foreach ($classes as $key => &$value) {
				if (empty($value['content_course_id'])) {
					continue;
				}

				if (empty($value['id'])) {
					unset($value['id']);
					$classesModel = new ClassesModel;
				} else {
					$classesModel = ClassesModel::find($value['id']);

					if (!$classesModel) {
						$classesModel = new ClassesModel;
					}
				}

				$value['class_id'] = $save->data->id;
				$value['course_id'] = $save->data->course_id;

				$videoLessons = [];

				if (isset($value['videoLessons'])) {
					for ($i = 0, $ii = count($value['videoLessons']); $i < $ii; $i++) {
						$videoLessons[] = [
							'video_lesson_id' => $value['videoLessons'][$i],
						];
					}
				}

				unset($value['videoLessons']);

				$classesModel->fill($value)->save();
				$classesModel->videoLesson()->sync($videoLessons);
				$classIds[] = $classesModel->id;
			}

			if (count($classIds)) {
				ClassesModel::where('class_id', $save->data->id)->whereNotIn('id', $classIds)->delete();
			}
		}
		*/

		(new StudentClassControlUtils)->generateByClass($save->data->id);
		/*$contentCourse = $request->get('contentCourse');
		ClassContentCourseModel::where('class_id', $save->data->id)->delete();
		if (!empty($contentCourse)) {

			foreach ($contentCourse as $key => &$value) {
				if (empty($value['content_course_id'])) {
					unset($contentCourse[$key]);
					continue;
				}

				$videoLessons = [];

				if (isset($value['videoLessons'])) {
					for ($i = 0, $ii = count($value['videoLessons']); $i < $ii; $i++) {
						$videoLessons[] = [
							'video_lesson_id' => $value['videoLessons'][$i],
						];
					}
				}

				unset($value['videoLessons']);

				$classContentCourse = new ClassContentCourseModel;

				if (empty($value['id'])) {
					unset($value['id']);
					$value['class_id'] = $save->data->id;
				} else {
					$classContentCourse = $classContentCourse::withTrashed()->find($value['id']);
					$classContentCourse->restore();
				}

				$classContentCourse->fill($value)->save();

				$classContentCourse->videoLesson()->sync($videoLessons);
			}
		}*/

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

	public function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		if (OrderModel::where('class_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar essa turma, pois existe inscrição ativa vinculada a mesma',
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
