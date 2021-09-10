<?php

namespace App\Http\Controllers\Admin\Prospection\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;

use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseModel;

class CourseCategoryController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'courseCategory';

		$this->apiModel = new CourseCategoryModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/courseCategory',
			'urlAction' => 'admin/prospection/course_category',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Cursos',
				'url_group' => '#',
				'module_page' => 'Categoria de Cursos',
				'url_page' => 'admin/prospection/course_category',
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
		$dataTable->data = CourseCategoryModel::withTrashed()->with('courseCategoryType')->get();
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

		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/course_category', $fileName);
			$request['image'] = $fileName;
		}

		$save = parent::save($request);

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

	public function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		if (CourseModel::where('course_category_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar essa categoria, pois existe curso ativo vinculado a mesma',
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
