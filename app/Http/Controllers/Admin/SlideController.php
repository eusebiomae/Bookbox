<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\SlideModel;

use App\Model\api\Configuration\ContentPageModel;

use File;

class SlideController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'pageSlide';

		$this->apiModel = new SlideModel();

		$this->config = (object) [
			'pathView' => 'admin/slide',
			'urlAction' => 'admin/slide',
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
		$dataTable->data = SlideModel::withTrashed()->with('contentPage')->get();

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
				'label' => 'Página',
				'column' => 'contentPage.description_pt',
			],
			// (object) [
			// 	'label' => 'Status',
			// 	'column' => 'status',
			// ],
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
		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/slides', $fileName);
			$request['image'] = $fileName;
		}

		return parent::save($request);
	}

}
