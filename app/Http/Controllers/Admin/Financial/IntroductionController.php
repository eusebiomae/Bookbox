<?php

namespace App\Http\Controllers\Admin\Financial;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\Financial\IntroductionModel;
use App\Model\api\FormPaymentModel;

class IntroductionController extends BaseMethodController {
	function __construct() {
		$this->pageKey = 'introduction';

		$this->apiModel = new IntroductionModel();

		$this->config = (object) [
			'pathView' => 'admin/introduction',
			'urlAction' => 'admin/introduction',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->form_payment = FormPaymentModel::orderBy('description')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = IntroductionModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Name',
				'column' => 'title',
			],
			(object) [
				'label' => 'Forma de Pagamento',
				'column' => 'formPayment.description',
			],
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
