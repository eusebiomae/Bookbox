<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\api\AdditionalModel;
use App\Model\api\CourseAdditionalModel;
use Illuminate\Http\Request;

class AdditionalController extends Controller {
	function __construct() {
		$this->pageKey = 'additional';

		$this->apiModel = AdditionalModel::class;
		$this->config = (object) [
			'pathView' => 'admin.additional.',
			'urlAction' => '/admin/additional',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		return $list;
	}

	public function list(Request $request) {
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
			'dataTable' => $dataTable,
		]);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->title = 'Cadastro de Adicionais';
		$this->config->subtitle = 'Inserir todas as informações referente a Adicionais.';

		return view($this->config->pathView . 'form')->with('payload', (object) [
			'config' => $this->config,
			'listSelectBox' => $this->getListSelectBox(),
		]);
	}

	public function update(Request $request, $id) {
		$this->config->fileView = 'form';
		$this->config->title = 'Alterar de Adicionais';
		$this->config->subtitle = 'Edite todas as informações referente a Adicionais.';

		return view($this->config->pathView . 'form')->with('payload', (object) [
			'config' => $this->config,
			'listSelectBox' => $this->getListSelectBox(),
			'data' => $this->apiModel::find($id),
		]);
	}

	public function save(Request $request) {
		if ($request->get('id')) {
			$additional = $this->apiModel::find($request->get('id'));

			if (!$additional) {
				$additional = new $this->apiModel;
			}
		} else {
			$additional = new $this->apiModel;
		}

		$additional->fill($request->all())->save();

		return redirect("{$this->config->urlAction}/update/{$additional->id}");
	}

	function delete(Request $request, $id) {
		$withInput = [ 'swal' => null ];

		if (CourseAdditionalModel::where('additional_id', $id)->first()) {
			$withInput['swal'] = [
				'type' => 'warning',
				'title' => 'Não é possível inativar esse Adicional, pois está vinculado a uma turma ativa',
				'confirmButtonColor' => '#DD6B55',
			];
		} else {
			$data = $this->apiModel::find($id);

			if (!$data) {
				return response()->json([
					'message' => 'Record not found',
				], 404);
			}

			$data->delete();
		}

		return redirect()->back()->withInput($withInput);
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
