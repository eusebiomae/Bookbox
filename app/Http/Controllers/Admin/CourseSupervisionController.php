<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\CourseSupervisionModel;
use App\Model\api\OrderModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\TeamModel;

class CourseSupervisionController extends BaseMethodController {
	function __construct() {
		$this->pageKey = 'courseSupervision';

		$this->apiModel = new CourseSupervisionModel();

		$this->config = (object) [
			'pathView' => 'admin/courseSupervision',
			'urlAction' => 'admin/course_supervision',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->courseCategory = CourseCategoryModel::orderBy('description_pt')->get();
		// $list->course = CourseModel::orderBy('title_pt')->get();
		$list->teacher = TeamModel::orderBy('name')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = [
			'active' => (object) [
				'id' => 'active',
			],
			'finished' => (object) [
				'id' => 'finished',
			],
			'inactive' => (object) [
				'id' => 'inactive',
			],
		];

		$dataTable['active']->header =
		$dataTable['finished']->header =
		$dataTable['inactive']->header = [
			[ 'title' => 'ID', 'data' => 'id', ],
			[ 'title' => 'Data', 'data' => 'date', ],
			[ 'title' => 'Categoria', 'data' => 'course_category.description_pt', ],
			[ 'title' => 'Aluno', 'data' => 'value_3', 'className' => 'mask-money', ],
			[ 'title' => 'Ex-alunos do CETCC', 'data' => 'value_1', 'className' => 'mask-money', ],
			[ 'title' => 'Avulsos', 'data' => 'value_2', 'className' => 'mask-money', ],
			[ 'title' => '', 'className' => 'center', 'btnUpd' => '/admin/course_supervision' ],
			[ 'title' => '', 'className' => 'center', 'btnDel' => '/admin/course_supervision' ],
		];

		$dataTableActive = CourseSupervisionModel::with([
			'courseCategory',

		])->orderBy('date');

		$dataTableFinished = clone $dataTableActive;
		$dataTableInactive = clone $dataTableActive;

		$dataTable['active']->data = $dataTableActive->where('status', 'A')->get();
		$dataTable['finished']->data = $dataTableFinished->where('status', 'I')->get();
		$dataTable['inactive']->data = $dataTableInactive->onlyTrashed()->get();

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Cadastro de Supervisões';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente a supervisão em um único lugar.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Cadastro de Supervisões';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente a supervisão em um único lugar.';

		$view = parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());
		// return $view->data;
		// $courseIds = CourseSupervisionCoursesModel::where('course_supervision_id', $view->data['id'])->get();

		// $view->data['course_id'] = [];

		// foreach ($courseIds as &$courseId) {
		// 	$view->data['course_id'][] = $courseId->course_id;
		// }

		$view->data['value_1'] = number_format($view->data['value_1'], 2, '.', '');
		$view->data['value_2'] = number_format($view->data['value_2'], 2, '.', '');
		$view->data['value_3'] = number_format($view->data['value_3'], 2, '.', '');

		return $view;
	}

	function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!$request->get('status')) {
			$request['status'] = 'I';
		}

		$save = parent::save($request);

		// $save->data->courseCategory()->sync($request->get('course_cagory_id'));

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

	public function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		if (OrderModel::where('supervision_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar essa Supervisão, pois existe inscrição ativa vinculada a mesma',
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
