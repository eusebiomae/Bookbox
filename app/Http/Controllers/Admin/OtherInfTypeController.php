<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseMethodAdminController;
use Illuminate\Http\Request;
use App\Model\api\OtherInfTypeModel;

class OtherInfTypeController extends BaseMethodAdminController {

	function __construct() {
		$this->pageKey = 'otherInfType';

		$this->apiModel = OtherInfTypeModel::class;
		$this->config = (object) [
			'urlBase' => '/admin/other_inf_type',
			'urlAction' => '/admin/other_inf_type/save',
			'pathView'  => 'admin.pages.otherInfType',
			'pathViewInclude'  => 'admin.pages.otherInfType.form',
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
					'url' => '/admin/other_inf_type',
					'label' => 'Tipo de Outras Informações',
				],
			],
		];
	}

	public function list(Request $request) {
		$this->config->pathView = 'admin.components';
		$this->config->fileView = '.list';
		$this->config->title = 'Listar Tipo de Outras Informações';
		$this->config->contentTitle = 'Lista de Tipo de Outras Informações';
		$this->config->breadcrumbs[] = [ 'label' => 'Listar' ];

		$dataTableHeader = [
			[ 'title' => 'ID', 'data' => 'id', 'width' => '10px', ],
			[ 'title' => 'Nome', 'data' => 'description_pt', ],
			[ 'title' => 'Flag', 'data' => 'flg', ],

			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnUpd' => $this->config->urlBase ],
			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnDel' => $this->config->urlBase ],
		];

		return parent::list($request)
		->with('dataTable', parent::getListEnableDisable((object) [
			'dataTableHeader' => $dataTableHeader,
			'apiModel' => $this->apiModel::query(),
		]));
	}

	function insert(Request $request) {
		$this->config->title = 'Inserir Tipo de Outras Informações';
		$this->config->contentTitle = 'Criar Tipo de Outras Informações';
		$this->config->breadcrumbs[] = [ 'label' => 'Inserir' ];

		return parent::insert($request);
	}

	function update(Request $request) {
		$this->config->title = 'Editar Tipo de Outras Informações';
		$this->config->contentTitle = 'Alterar Tipo de Outras Informações';
		$this->config->breadcrumbs[] = [ 'label' => 'Editar' ];

		$view = parent::update($request)
		->with('payload', ['data' => $this->apiModel::find($request->id),]);

		return $view;
	}
}
