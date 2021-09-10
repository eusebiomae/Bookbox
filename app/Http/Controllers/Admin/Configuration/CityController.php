<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\CityModel;

class CityController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'city';

		$this->apiModel = new CityModel;
		$this->config = (object) [
			'pathView'  => 'admin.configuration.city',
			'urlAction' => 'admin/configuration/city',
			'header' => 'layouts.header',
			'breadcrumbs' => [
				[
					'url' => '/admin',
					'label' => 'Home',
				],
				[
					'label' => 'Gestão Clientes',
				],
				[
					'label' => 'Configurações',
				],
				[
					'url' => '/admin/configuration/city',
					'label' => 'Cidade de Atuação',
				],
				[
					'url' => '/admin/configuration/city',
					'label' => 'Cidade de Atuação',
				],
			],
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->title = 'Listar';
		$this->config->breadcrumbs[] = [ 'label' => 'Listar' ];

		$dataTable = new \stdClass();
		$dataTable->data = CityModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Nome',
				'column' => 'name',
			],
		];

		return parent::list($request)->with('dataTable', $dataTable);
	}

	public function insert(Request $request) {
		$this->config->title = 'Inserir';
		$this->config->breadcrumbs[] = [ 'label' => 'Inserir' ];

		return parent::insert($request);
	}

	public function update(Request $request) {
		$this->config->title = 'Editar';
		$this->config->breadcrumbs[] = [ 'label' => 'Editar' ];

		return parent::update($request);
	}
}
