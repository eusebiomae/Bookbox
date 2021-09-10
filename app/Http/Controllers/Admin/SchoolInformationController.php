<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\SchoolInformationModel;

use App\Model\api\Configuration\StateModel;
use App\Model\ParametersAppModel;
use File;

class SchoolInformationController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'schoolInformation';

		$this->apiModel = new SchoolInformationModel();

		$this->config = (object) [
			'pathView' => 'admin/schoolinformation',
			'urlAction' => 'admin/schoolinformation',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Dados Empresa ',
				'url_group' => '#',
				'module_page' => 'Unidade Empresarial',
				'url_page' => 'admin/schoolinformation',
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->state = (new StateModel())->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$listSelectBox = $this->getListSelectBox();


		$dataTable = new \stdClass();
		$dataTable->data = SchoolInformationModel::withTrashed()->with('state')->get();

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
				'column' => 'city',
			],
			(object) [
				'label' => 'UF',
				'column' => 'state.abbreviation',
			],
			(object) [
				'label' => 'Telefone Principal',
				'column' => 'phone1',
			],

			(object) [
				'label' => 'Celular Principal',
				'column' => 'cell_phone1',
			],

			(object) [
				'label' => 'E-mail Principal',
				'column' => 'email1',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request)
		->with('listSelectBox', $listSelectBox);
	}

	function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Cadastrar Usuário';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao usuário do sistema.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Editar Usuário';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao usuário do sistema.';

		$parametersApp = ParametersAppModel::whereNull('user_id')->first();

		return parent::update($request)
		->with('parametersApp', (isset($parametersApp) ? json_decode($parametersApp->payload) : null))
		->with('listSelectBox', $this->getListSelectBox());
	}

	function save(Request $request) {
		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/scholinformation', $fileName);
			$request['image'] = $fileName;
		}

		$parametersApp = $request->get('parametersApp');

		if ($parametersApp) {
			ParametersAppModel::whereNull('user_id')->update([
				'payload' => json_encode($parametersApp),
			]);
		}

		return parent::save($request);
	}

}
