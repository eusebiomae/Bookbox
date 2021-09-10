<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\OfficeModel;

class OfficeController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'office';

		$this->apiModel = new OfficeModel();

		$this->config = (object) [
			'pathView' => 'admin/configuration/office',
			'urlAction' => 'admin/configuration/office',
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = OfficeModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Descrição pt',
				'column' => 'description_pt',
			],
			(object) [
				'label' => 'Descrição en',
				'column' => 'description_en',
			],
			(object) [
				'label' => 'Descrição es',
				'column' => 'description_es',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}
}
