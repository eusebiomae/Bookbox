<?php

namespace App\Http\Controllers\Admin\Prospection\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;

use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;

class CourseCategoryTypeController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'courseCategoryType';

		$this->apiModel = new CourseCategoryTypeModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/courseCategoryType',
			'urlAction' => 'admin/prospection/course_category_type',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Cursos',
				'url_group' => '#',
				'module_page' => 'Tipo de Categoria do Cursos',
				'url_page' => 'admin/prospection/course_category_type',
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = $this->apiModel::withTrashed()->get();
		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Título',
				'column' => 'title',
			],
			(object) [
				'label' => 'Descrição',
				'column' => 'description',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Cadastro de Tipo de Categoria do Cursos';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao Tipo de Categoria do Cursos.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Edição de Tipo de Categoria do Cursos';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao Tipo de Categoria do Cursos.';
		$listSelectBox = $this->getListSelectBox();

		$view = parent::update($request);

		return $view
			->with('listSelectBox', $listSelectBox);
	}

	public function save(Request $request) {
		if(!$request->get('invisible')){
			$request['invisible'] = null;
		}

		if(!$request->get('invisible_connected')){
			$request['invisible_connected'] = null;
		}

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/courseCategoryType', $fileName);
			$request['image'] = $fileName;
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

		if (CourseModel::where('course_category_type_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar esse tipo de categoria, pois existe curso ativo vinculado a mesma',
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
