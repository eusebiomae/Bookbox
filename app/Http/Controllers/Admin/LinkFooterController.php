<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\LinkFooterModel;

class LinkFooterController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'linkFooter';

		$this->apiModel = new LinkFooterModel();

		$this->config = (object) [
			'pathView' => 'admin/link_footer',
			'urlAction' => 'admin/link_footer',
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
		$dataTable->data = LinkFooterModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Label',
				'column' => 'label',
			],
			(object) [
				'label' => 'Link',
				'column' => 'url',
			]
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

	function view(Request $request) {
		return parent::view($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function save(Request $request) {
		return parent::save($request);
	}

}
