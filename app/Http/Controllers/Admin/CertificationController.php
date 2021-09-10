<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\CertificationModel;

class CertificationController extends BaseMethodController {
	function __construct() {
		$this->pageKey = 'certification';

		$this->apiModel = new CertificationModel();

		$this->config = (object) [
			'pathView' => 'admin/certification',
			'urlAction' => 'admin/certification',
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
		$dataTable->data = CertificationModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Título',
				'column' => 'title_pt',
			],
			(object) [
				'label' => 'Descrição',
				'column' => 'description_pt',
			],
			(object) [
				'label' => 'Imagem',
				'column' => 'image',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Cadastro de Certificado';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao Certificado.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Edição de dados do Certificado';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao Certificado.';

		$view = parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());

		return $view;
	}

	function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/certification', $fileName);
			$request['image'] = $fileName;
		}

		$save = parent::save($request);

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}
}
