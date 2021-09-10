<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\MetaTagModel;

class ContentPageController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'page';

		$this->apiModel = new ContentPageModel();

		$this->config = (object) [
			'pathView' => 'admin/configuration/contentPage',
			'urlAction' => 'admin/configuration/contentpage',
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = ContentPageModel::withTrashed()->get();

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

	function update(Request $request) {
		return parent::update($request)
		->with('metaTag', MetaTagModel::query()->where('content_page_id', $request->id)->get());
	}

	public function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$save = parent::save($request);

		$metaTagInsUpd = [ 'ins' => [], 'upd' => [], 'ids' => [] ];

		if ($request->get('metaTag')) {
			foreach ($request->get('metaTag') as $metaTag) {
				$metaTag['content_page_id'] = $save->data->id;

				if (empty($metaTag['id'])) {
					unset($metaTag['id']);
					$metaTagInsUpd['ins'][] = $metaTag;
				} else {
					$metaTagInsUpd['upd'][] = $metaTag;
					$metaTagInsUpd['ids'][] = $metaTag['id'];
				}
			}
		}

		$metaTagModel = MetaTagModel::query()->where('content_page_id', $save->data->id);
		if (count($metaTagInsUpd['ids'])) {
			$metaTagModel->whereNotIn('id', $metaTagInsUpd['ids']);
		}
		$metaTagModel->delete();

		if (count($metaTagInsUpd['ins'])) {
			MetaTagModel::insert($metaTagInsUpd['ins']);
		}

		if (count($metaTagInsUpd['upd'])) {
			foreach ($metaTagInsUpd['upd'] as $upd) {
				MetaTagModel::find($upd['id'])->update($upd);
			}
		}

		return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
	}
}
