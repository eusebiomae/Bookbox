<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\api\TypePaymentModel;

class TypePaymentController extends Controller {

	function __construct() {
		$this->pageKey = 'typePayment';

		$this->model = TypePaymentModel::class;

		$this->dataPage = [
			'title' => 'Tipo de pagamento',
			'titlePage' => 'Lista de Tipo de pagamento',
		];
	}

	public function list(Request $request) {
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'label' => 'Listas de Tipo de pagamento',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/type_payment/insert',
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
				'label' => 'Tipo de pagamento',
				'column' => 'description',
			],
		];

		return view('admin/_components/listDefault')
			->with('url_page', '/admin/type_payment')
			->with('dataPage', toObject($this->dataPage));
	}

	public function insert(Request $request) {
		$this->dataPage['urlAction'] = '/admin/type_payment/save';
		$this->dataPage['pathView'] = 'admin/type_payment/form';
		$this->dataPage['titlePage'] = 'Cadastro de Tipo de pagamento';
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'url' => '/admin/type_payment',
				'label' => 'Listas de Tipo de pagamento',
			],
			[
				'label' => 'Inserir Nova Tipo de pagamento',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/type_payment',
				'label' => 'Lista',
				'icon' => 'fa fa-list',
				'class' => 'btn-primary',
			],
		];

		return view('admin/_components/formDefault')->with('dataPage', toObject($this->dataPage));
	}

	public function update(Request $request, $id) {
		$this->dataPage['urlAction'] = '/admin/type_payment/save';
		$this->dataPage['pathView'] = 'admin/type_payment/form';
		$this->dataPage['titlePage'] = 'Edição de Tipo de pagamento';
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'url' => '/admin/type_payment',
				'label' => 'Listas de Tipo de pagamento',
			],
			[
				'label' => 'Editar a Tipo de pagamento',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/type_payment',
				'label' => 'Lista',
				'icon' => 'fa fa-list',
				'class' => 'btn-primary',
			],
		];

		$data = $this->model::find($id);

		return view('admin/_components/formDefault')
		->with('data', $data)
		->with('dataPage', toObject($this->dataPage));
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
