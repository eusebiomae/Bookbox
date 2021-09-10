<?php

namespace App\Http\Controllers\Admin\Prospection\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\CourseModuleModel;
use App\Model\api\Prospection\ClassModel;
use App\Model\api\Prospection\ContentCourseModel;
use App\Model\api\Prospection\CourseCategoryModel;

class ContentCourseController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'contentCourse';

		$this->pathFile = 'storage/contentCourse';
		$this->apiModel = new ContentCourseModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/contentCourse',
			'urlAction' => 'admin/prospection/content_course',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Cursos',
				'url_group' => '#',
				'module_page' => 'Módulos',
				'url_page' => 'admin/prospection/content_course',
				'pathFile' => $this->pathFile,
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->courseCategory = CourseCategoryModel::orderBy('description_pt')->get();
		$list->class = ClassModel::orderBy('name')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = ContentCourseModel::withTrashed()->with([
			'courseCategory' => function($query) {
				$query->select('description_pt');
			},
		])->get();

		foreach ($dataTable->data as &$data) {
			$courseCategoryArr = [];
			foreach ($data->courseCategory as $courseCategory) {
				$courseCategoryArr[] = $courseCategory->description_pt;
			}

			$data['courseCategory'] = implode(', ', $courseCategoryArr);
		}

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Categoria',
				'column' => 'courseCategory',
			],
			(object) [
				'label' => 'Título',
				'column' => 'title_pt',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Ficha cadastral do Aluno';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao aluno em um único lugar.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Ficha de edição do Aluno';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao aluno em um único lugar.';

		$listSelectBox = $this->getListSelectBox();

		$view = parent::update($request);

		return $view
			->with('listSelectBox', $listSelectBox)
			->with('payload', (object) [
				'courseModule' => CourseModuleModel::where('content_course_id', $view->data['id'])->whereNull('course_id')->get(),
				'courseCategory' => CourseCategoryModel::whereHas('module', function($query) use($view) {
					$query->where('module_id', $view->data['id']);
				})->get(),
			]);
	}

	public function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move($this->pathFile, $fileName);
			$request['img'] = $fileName;
		}

		$save = parent::save($request);

		$save->data->courseCategory()->sync($request->get('course_category_id'));

		$module = $request->get('module');

		CourseModuleModel::where('content_course_id', $save->data->id)->whereNull('course_id')->delete();

		if (!empty($module)) {
			foreach ($module as $key => &$value) {
				if (empty($value['class_id'])) {
					unset($module[$key]);
					continue;
				}

				$value['content_course_id'] = $save->data->id;

				if (empty($value['id'])) {
					unset($value['id']);
				}

				(new CourseModuleModel)->fill($value)->save();
			}
		}

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

}
