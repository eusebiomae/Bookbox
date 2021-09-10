<?php

namespace App\Http\Controllers\Admin\Prospection;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\Prospection\VideoModel;

class VideoController extends BaseMethodController {
	function __construct() {
		$this->pageKey = 'video';

		$this->apiModel = new VideoModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/video',
			'urlAction' => 'admin/prospection/video',
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
		$dataTable->data = VideoModel::withTrashed()->get(['id', 'title', 'description', 'deleted_at']);

		$dataTable->header = [
			[
				'title' => 'ID',
				'data' => 'id',
			],
			[
				'title' => 'Name',
				'data' => 'title',
			],
			[
				'title' => 'Descrição',
				'data' => 'description',
			],

			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnUpd' => "/{$this->config->urlAction}" ],
			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnDel' => "/{$this->config->urlAction}" ],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Cadastro de Instrução';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente a Instrução em um único lugar.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Cadastro de Instrução';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente a Instrução em um único lugar.';

		$view = parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());

		return $view;
	}

	function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$save = parent::save($request);

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}
}
