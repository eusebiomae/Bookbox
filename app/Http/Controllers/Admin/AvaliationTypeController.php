<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\AvaliationTypeModel;

use App\Model\api\Configuration\ContentPageModel;

use File;

class AvaliationTypeController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'avaliationType';

		$this->apiModel = new AvaliationTypeModel();

		$this->config = (object) [
			'pathView' => 'admin/avaliation_type',
			'urlAction' => 'admin/avaliation_type',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->contentPage = (new ContentPageModel())->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = AvaliationTypeModel::withTrashed()->with('contentPage')->get();

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

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		return parent::insert($request)->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		return parent::update($request)->with('listSelectBox', $this->getListSelectBox());
	}

	function save(Request $request) {
		return parent::save($request);
	}

}
