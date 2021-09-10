<?php

namespace App\Http\Controllers\Admin\Prospection\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\CourseFormPaymentModel;
use App\Model\api\FormPaymentModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\CourseSubcategoryModel;

class CourseSubcategoryController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'courseSubcategory';

		$this->apiModel = new CourseSubcategoryModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/courseSubcategory',
			'urlAction' => 'admin/prospection/course_subcategory',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Cursos',
				'url_group' => '#',
				'module_page' => 'Subcategoria de Cursos',
				'url_page' => 'admin/prospection/course_subcategory',
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->formPayment = FormPaymentModel::orderBy('description')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = CourseSubcategoryModel::withTrashed()->get();
		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Descrição',
				'column' => 'description_pt',
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
		$listSelectBox->values = CourseFormPaymentModel::where('course_subcategory_id', $request->id)->whereNull('course_id')->orderBy('date')->get();

		$view = parent::update($request)->with('listSelectBox', $listSelectBox);

		return $view;
	}

	public function save(Request $request) {
		if(!$request->get('invisible')){
			$request['invisible'] = null;
		}

		if(!$request->get('invisible_connected')){
			$request['invisible_connected'] = null;
		}

		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$save = parent::save($request);

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

	public function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		if (CourseModel::where('course_subcategory_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar essa subcategoria, pois existe curso ativo vinculado a mesma',
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

	public function saveValues(Request $request) {
		$input = $request->all();

		$courseSubcategoryModel = CourseSubcategoryModel::find($input['course_subcategory_id']);

		if (isset($input['fine_value'])) {
			$courseSubcategoryModel->fill([
				'fine_value' => $input['fine_value'],
			])->save();
		}

		if (isset($input['formPayment'])) {
			$formPayment = $input['formPayment'];
			if (!empty($formPayment)) {
				foreach ($formPayment as $key => &$value) {
					if (empty($value['form_payment_id'])) {
						unset($formPayment[$key]);
						continue;
					}

					if (empty($value['id'])) {
						unset($value['id']);
					}

					$value = (new CourseFormPaymentModel($value))->toArray();
					$value['date'] = formatDateEng($value['date']);
					$value['course_subcategory_id'] = $input['course_subcategory_id'];
				}
			}

			$courseSubcategoryModel->formPayment()->sync($formPayment);

			$courses = CourseModel::where('course_subcategory_id', $input['course_subcategory_id'])->get();

			foreach ($courses as $course) {
				$course->formPayment()->sync($formPayment);
			}
		}

		return redirect()->back();
	}
}
