<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseMethodAdminController;
use Illuminate\Http\Request;
use App\Model\api\OtherInfModel;
use App\Model\api\OtherInfTypeModel;

class OtherInfController extends BaseMethodAdminController {

	function __construct() {
		$this->pageKey = 'otherInf';

		$this->pathFile = 'storage/otherInf';
		$this->apiModel = OtherInfModel::class;
		$this->config = (object) [
			'urlBase' => '/admin/other_inf',
			'urlAction' => '/admin/other_inf/save',
			'pathView'  => 'admin.pages.otherInf',
			'pathViewInclude'  => 'admin.pages.otherInf.form',
			'header' => 'admin.layouts.header',
			'breadcrumbs' => [
				[
					'url' => '/admin',
					'label' => 'Home',
				],
				[
					'label' => 'Gestão Site',
				],
				[
					'url' => '/admin/other_inf',
					'label' => 'Outras Informações',
				],
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->other_inf_type_id = OtherInfTypeModel::orderBy('description_pt')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->pathView = 'admin.components';
		$this->config->fileView = '.list';
		$this->config->title = 'Listar Outras Informações';
		$this->config->contentTitle = 'Lista de Outras Informações';
		$this->config->breadcrumbs[] = [ 'label' => 'Listar' ];

		$dataTableHeader = [
			[ 'title' => 'ID', 'data' => 'id', 'width' => '10px', ],
			[ 'title' => 'Nome', 'data' => 'title', ],
			[ 'title' => 'Tipo', 'data' => 'other_inf_type.description_pt', ],

			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnUpd' => $this->config->urlBase ],
			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnDel' => $this->config->urlBase ],
		];

		return parent::list($request)
		->with('dataTable', parent::getListEnableDisable((object) [
			'dataTableHeader' => $dataTableHeader,
			'apiModel' => $this->apiModel::query()->with([
				'otherInfType',
			]),
		]));
	}

	function insert(Request $request) {
		$this->config->title = 'Inserir Outras Informações';
		$this->config->contentTitle = 'Criar Outras Informações';
		$this->config->breadcrumbs[] = [ 'label' => 'Inserir' ];

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		$this->config->title = 'Editar Outras Informações';
		$this->config->contentTitle = 'Alterar Outras Informações';
		$this->config->breadcrumbs[] = [ 'label' => 'Editar' ];

		$view = parent::update($request)
		->with('payload', ['data' => $this->apiModel::find($request->id),])
		->with('listSelectBox', $this->getListSelectBox());

		return $view;
	}
	public function save(Request $request) {
		if (!empty($request->file('fileImage') )) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());
			$request->file('fileImage')->move($this->pathFile . '/img', $fileName);
			$request['img'] = $fileName;
		}

		return parent::save($request);
	}
}
