<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\ContentSectionModel;

use App\Model\api\Configuration\ContentPageModel;

class ContentSectionController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'contentSection';

		$this->apiModel = new ContentSectionModel();

		$this->config = (object) [
			'pathView' => 'admin/configuration/contentSection',
			'urlAction' => 'admin/configuration/contentsection',
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = ContentSectionModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Página',
				'column' => 'contentPage.description_pt',
			],
			(object) [
				'label' => 'Descrição pt',
				'column' => 'description_pt',
			],
			(object) [
				'label' => 'Flag do Componente',
				'column' => 'component',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->contentPage = (new ContentPageModel())->get();

		return $list;
	}

	function insert(Request $request) {
		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		return parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

}
