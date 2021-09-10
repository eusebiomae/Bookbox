<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\TestemonialModel;

use App\Model\api\Configuration\ContentPageModel;

class TestemonialController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'testemonial';

		$this->apiModel = new TestemonialModel();

		$this->config = (object) [
			'pathView' => 'admin/testemonial',
			'urlAction' => 'admin/testemonial',
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
		$dataTable->data = TestemonialModel::withTrashed()->get();

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
				'label' => 'Resumo',
				'column' => 'abstract_pt',
			],
			(object) [
				'label' => 'Status',
				'column' => 'status',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		return parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function save(Request $request) {
		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$path = $request->file('fileImage')->move('storage/testemonial', $fileName);
			$request['image'] = $fileName;
		}

		return parent::save($request);
	}

}
