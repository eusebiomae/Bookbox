<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\FAQModel;

class FaqController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'faq';

		$this->apiModel = new FAQModel();

		$this->config = (object) [
			'pathView' => 'admin/faq',
			'urlAction' => 'admin/faq',
		];
	}


	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$faqList = FaqModel::withTrashed();

		if ($request->get('search')) {
			$search = $request->get('search');
			$faqList->whereRaw("question like '%{$search}%' OR answer like '%{$search}%'");
		}

		$dataTable->data = $faqList->get();
		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Questão',
				'column' => 'question',
			],
			(object) [
				'label' => 'Resposta',
				'column' => 'answer',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request)
		->with('params', $request->all());
	}

	function insert(Request $request) {
		return parent::insert($request);
	}

	function update(Request $request) {
		return parent::update($request);
	}

}
