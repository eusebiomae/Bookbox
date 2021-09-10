<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\api\FormPaymentModel;
use GigaGetData;

class FormPaymentController extends Controller {

	function __construct() {
    $this->pageKey = 'formPayment';

		$this->model = FormPaymentModel::class;

		$this->dataPage = [
			'title' => 'Forma de pagamento',
			'titlePage' => 'Lista de Forma de pagamento',
		];
	}

	public function list(Request $request) {
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'label' => 'Listas de Forma de pagamento',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/form_payment/insert',
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
				'label' => 'Forma de pagamento',
				'column' => 'description',
			],
			[
				'label' => 'Mostrar no site',
				'column' => 'labelFlgWeb',
			],
		];

		return view('admin/_components/listDefault')
			->with('url_page', '/admin/form_payment')
			->with('dataPage', toObject($this->dataPage));
	}

	public function insert(Request $request) {
		$this->dataPage['urlAction'] = '/admin/form_payment/save';
		$this->dataPage['pathView'] = 'admin/form_payment/form';
		$this->dataPage['titlePage'] = 'Cadastro de Forma de pagamento';
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'url' => '/admin/form_payment',
				'label' => 'Listas de Forma de pagamento',
			],
			[
				'label' => 'Inserir Nova Forma de pagamento',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/form_payment',
				'label' => 'Lista',
				'icon' => 'fa fa-list',
				'class' => 'btn-primary',
			],
		];

		return view('admin/_components/formDefault')
		->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey))
		->with('dataPage', toObject($this->dataPage));
	}

	public function update(Request $request, $id) {
		$this->dataPage['urlAction'] = '/admin/form_payment/save';
		$this->dataPage['pathView'] = 'admin/form_payment/form';
		$this->dataPage['titlePage'] = 'Edição de Forma de pagamento';
		$this->dataPage['breadcrumbs'] = [
			[
				'url' => '/admin',
				'label' => 'Home',
			],
			[
				'url' => '/admin/form_payment',
				'label' => 'Listas de Forma de pagamento',
			],
			[
				'label' => 'Editar a Forma de pagamento',
			],
		];

		$this->dataPage['btnTopRight'] = [
			[
				'url' => '/admin/form_payment',
				'label' => 'Lista',
				'icon' => 'fa fa-list',
				'class' => 'btn-primary',
			],
		];

		$data = $this->model::find($id);

		return view('admin/_components/formDefault')
		->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey))
		->with('data', $data)
		->with('dataPage', toObject($this->dataPage));
	}

  public function save(Request $request) {
		if (!empty($request->get('id'))) {
			$data = $this->model::find($request->get('id'));
		} else {
			$data = new $this->model;
		}

		if (!isset($request['flg_web'])) {
			$request['flg_web'] = null;
		}

		if (!isset($request['flg_free'])) {
			$request['flg_free'] = null;
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
