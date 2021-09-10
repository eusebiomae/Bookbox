<?php

namespace App\Http\Controllers;

use GigaGetData;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BaseMethodController extends Controller {
	function index() {
		$data = $this->apiModel->get();

		return view($this->pathView . '/index')
		->with('data', $data);
	}

	public function list(Request $request) {
		if (isset($this->config)) {
			$view = view($this->config->pathView . '/' . (isset($this->config->fileView) && !empty($this->config->fileView) ? $this->config->fileView : 'list'));

			if (!isset($this->config->toView['url_page'])) {
				$this->config->toView['url_page'] = $this->config->urlAction;
			}

			$this->config->fileView = isset($this->config->fileView) ? $this->config->fileView : 'list';

			if (isset($this->config->toView) && is_array($this->config->toView)) {
				if(empty(array_search('title_page', $this->config->toView))){
					$this->config->toView = array_merge([
						'title_page' => 'Listar',
					], $this->config->toView);
				}

				foreach ($this->config->toView as $key => $value) {
					$view->with($key, $value);
				}
			}

			$view->with('urlAction', '/' . $this->config->urlAction . '/save')
			->with('fileView', (isset($this->config->fileView) ? $this->config->fileView : ''));
		} else {
			$view = view($this->pathView  . '/list');
		}

		return $view;
	}

	public function insert(Request $request) {
		if (!isset($this->config)) {
			$this->config = new \stdClass();
			$this->config->pathView = isset($this->pathView) ? $this->pathView : '';
			$this->config->urlAction = $this->config->pathView;
		}

		$this->config->fileView = isset($this->config->fileView) ? $this->config->fileView : 'form';

		$view = view($this->config->pathView . '/' . (isset($this->config->fileView) && !empty($this->config->fileView) ? $this->config->fileView : 'form'))
		->with('urlAction', '/' . $this->config->urlAction . '/save');

		if (isset($this->config->toView) && is_array($this->config->toView)) {
			$this->config->toView = array_merge([
				'title_page' => 'Inserir',
			], $this->config->toView);

			foreach ($this->config->toView as $key => $value) {
				$view->with($key, $value);
			}
		}

		return $view->with('fileView', $this->config->fileView)
		->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey));
	}

	public function update(Request $request) {
		if (!isset($this->config)) {
			$this->config = new \stdClass();
			$this->config->pathView = isset($this->pathView) ? $this->pathView : '';
			$this->config->urlAction = $this->config->pathView;
		}

		$this->config->fileView = isset($this->config->fileView) ? $this->config->fileView : 'form';

		$paramsConfig = [
			'findItem' => true
		];

		if (is_null($request->paramsConfig)) {
			$request->paramsConfig = [];
		}

		$paramsConfig = (object) array_merge($paramsConfig, $request->paramsConfig);

		$view = view($this->config->pathView . '/' . (isset($this->config->fileView) && !empty($this->config->fileView) ? $this->config->fileView : 'form'))
		->with('urlAction', '/' . $this->config->urlAction . '/save');

		if ($paramsConfig->findItem && $request->id) {

			if (isset($this->data)) {
				$data = $this->data;
			} else {
				$dataFind = $this->apiModel::find($request->id);

				if (is_null($dataFind)) {
					return redirect()->back();
				}

				$data = $dataFind->toArray();
			}

			if ($data) {
				$view->with('data', $data);
			}
		}

		if (isset($this->config->toView) && is_array($this->config->toView)) {
			$this->config->toView = array_merge([
				'title_page' => 'Editar',
			], $this->config->toView);

			foreach ($this->config->toView as $key => $value) {
				$view->with($key, $value);
			}
		}

		return $view->with('fileView', $this->config->fileView)
		->with('fieldPageConfig', GigaGetData::fieldPageConfig($this->pageKey));
	}

	function save(Request $request) {
		$paramsConfig = [
			'redirectBack' => true
		];

		if (is_null($request->paramsConfig)) {
			$request->paramsConfig = [];
		}

		$paramsConfig = (object) array_merge($paramsConfig, $request->paramsConfig);

		$input = $request->all();

		foreach($input as $key => $value) {
			$input[$key] = empty($value) && $value != 0 ? null : $value;
		}

		$toInsert = empty($input['id']);

		if ($toInsert) {
			$toSave = $this->apiModel;
		} else {
			$toSave = $this->apiModel::find($input['id']);
		}

		$toSave->fill($input)->save();

		if ($paramsConfig->redirectBack) {
			return redirect()->back();
		}

		return (object) [
			'action' => $toInsert ? 'I' : 'U',
			'data' => $toSave,
		];
	}

	function view(Request $request) {
		if ($request->id) {
			$data = $this->apiModel::find($request->id);

			if ($data) {
				return view($this->pathView . '/view')
				->with('data', $data);
			}
		}

		return response()->json([
			'message'   => 'Record not found',
		], 404);
	}

	function delete(Request $request, $id) {
		$data = $this->apiModel::find($id);

		if(!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		$data->delete();

		return redirect()->back();
	}

	function enable(Request $request, $id) {
		$data = $this->apiModel::withTrashed()->find($id);

		if(!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		$data->restore();

		return redirect()->back();
	}
}
