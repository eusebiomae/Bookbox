<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\api\DiscountModel;
use GigaGetData;
use Illuminate\Http\Request;

class DiscountController extends Controller {
	function __construct() {
		$this->pageKey = 'discount';

		$this->apiModel = DiscountModel::class;
		$this->config = (object) [
			'pathView' => 'admin.discount.',
			'urlAction' => '/admin/discount',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		return $list;
	}

	public function list(Request $request) {
		$this->config->title = 'Cadastro de Cupom de desconto';

		$dataTable = new \stdClass();

		$dataTable->data = $this->apiModel::withTrashed()->orderBy('title')->get();
		$dataTable->header = [
			[ 'title' => 'ID', 'data' => 'id', ],
			[ 'title' => 'Adicional', 'data' => 'title', ],
			[
				'title' => 'Editar',
				'className' => 'center',
				'width' => '100px',
				'btnUpd' => $this->config->urlAction,
			],
			[
				'title' => 'Habilitar/Desabilitar',
				'className' => 'center',
				'width' => '170px',
				'btnDel' => $this->config->urlAction,
			],
		];

		return view($this->config->pathView . 'list')->with('payload', (object) [
			'config' => $this->config,
			'dataTable' => $dataTable,
		]);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->title = 'Cadastro de Cupom de desconto';
		$this->config->subtitle = 'Inserir todas as informações referente a Cupom de desconto.';

		return view($this->config->pathView . 'form')->with('payload', (object) [
			'config' => $this->config,
			'listSelectBox' => $this->getListSelectBox(),
		])
		->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey));
	}

	public function update(Request $request, $id) {
		$this->config->fileView = 'form';
		$this->config->title = 'Alterar de Cupom de desconto';
		$this->config->subtitle = 'Edite todas as informações referente a Cupom de desconto.';

		return view($this->config->pathView . 'form')->with('payload', (object) [
			'config' => $this->config,
			'listSelectBox' => $this->getListSelectBox(),
			'data' => $this->apiModel::find($id),
		])
		->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey));
	}

	public function save(Request $request) {
		if ($request->get('id')) {
			$discount = $this->apiModel::find($request->get('id'));

			if (!$discount) {
				$discount = new $this->apiModel;
			}
		} else {
			$discount = new $this->apiModel;
		}

		$discount->fill($request->all())->save();

		return redirect("{$this->config->urlAction}/update/{$discount->id}");
	}

	function delete(Request $request, $id) {
		$data = $this->apiModel::find($id);

		if (!$data) {
			return response()->json([
				'message' => 'Record not found',
			], 404);
		}

		$data->delete();

		return redirect()->back();
	}

	function enable(Request $request, $id) {
		$data = $this->apiModel::withTrashed()->find($id);

		if (!$data) {
			return response()->json([
				'message' => 'Record not found',
			], 404);
		}

		$data->restore();

		return redirect()->back();
	}
}
