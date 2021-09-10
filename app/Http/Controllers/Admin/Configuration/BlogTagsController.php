<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\BlogTagModel;

class BlogTagsController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'blogTags';

		$this->apiModel = new BlogTagModel();

		$this->config = (object) [
			'pathView' => 'admin/configuration/blog/tags',
			'urlAction' => 'admin/configuration/blog/tags',
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = BlogTagModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Descrição',
				'column' => 'description',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	public function json(Request $request)
	{
		return BlogTagModel::select('id', 'description')->orderBy('description')->get();
	}
}
