<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\api\PlaceModel;

use App\Model\api\Configuration\StateModel;

class PlaceController extends Controller {

	function __construct() {
		$this->pageKey = 'place';

		$this->model = PlaceModel::class;

		$this->dataPage = [
			'title' => 'Local',
			'titlePage' => 'Lista de Locais',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->state = (new StateModel())->get();

		return $list;
	}

	public function list(Request $request) {
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'label' => 'Listas de Locais',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/place/insert',
				'label' => 'Novo',
				'icon' => 'fa fa-plus',
				'class' => 'btn-primary',
			],
		];

		$this->dataPage['dataTable'] = new \stdClass();
		$this->dataPage['dataTable']->data = $this->model::withTrashed()->get();

		$this->dataPage['dataTable']->header = [
			[
				'label' => 'ID',
				'column' => 'id',
			],
			[
				'label' => 'Local',
				'column' => 'description',
			],
			[
				'label' => 'Responsavel',
				'column' => 'responsible',
			],
		];

		return view('admin/_components/listDefault')
			->with('url_page', '/admin/place')
			->with('dataPage', toObject($this->dataPage));
	}

	public function insert(Request $request) {
		$this->dataPage['urlAction'] = '/admin/place/save';
		$this->dataPage['pathView'] = 'admin/place/form';
		$this->dataPage['titlePage'] = 'Cadastro de Local';
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'url' => '/admin/place',
				'label' => 'Listas de Locais',
			],
			[
				'label' => 'Inserir novo Local',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/place',
				'label' => 'Lista',
				'icon' => 'fa fa-list',
				'class' => 'btn-primary',
			],
		];

		return view('admin/_components/formDefault')
		->with('dataPage', toObject($this->dataPage))
		->with('listSelectBox', $this->getListSelectBox());
	}

	public function update(Request $request, $id) {
		$this->dataPage['urlAction'] = '/admin/place/save';
		$this->dataPage['pathView'] = 'admin/place/form';
		$this->dataPage['titlePage'] = 'Edição de Local';
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'url' => '/admin/place',
				'label' => 'Listas de Locais',
			],
			[
				'label' => 'Editar o Local',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/place',
				'label' => 'Lista',
				'icon' => 'fa fa-list',
				'class' => 'btn-primary',
			],
		];

		$data = $this->model::find($id);

		return view('admin/_components/formDefault')
		->with('data', $data)
		->with('dataPage', toObject($this->dataPage))
		->with('listSelectBox', $this->getListSelectBox());
	}

  public function save(Request $request) {
		if (!empty($request->get('id'))) {
			$data = $this->model::find($request->get('id'));
		} else {
			$data = new $this->model;
		}

		$data->fill($request->all());
		$data->save();

		return redirect()->back();
	}

	function delete(Request $request, $id) {
		$data = $this->model::find($id);

		if(!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		$data->delete();

		return redirect()->back();
	}

	function enable(Request $request, $id) {
		$data = $this->model::withTrashed()->find($id);

		if(!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		$data->restore();

		return redirect()->back();
	}
}
