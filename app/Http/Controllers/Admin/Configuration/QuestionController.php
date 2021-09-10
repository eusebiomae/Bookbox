<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodSystemController;
use App\Model\api\AlternativeModel;
use App\Model\api\QuestionModel;

class QuestionController extends BaseMethodSystemController
{

	function __construct()
	{
		$this->pageKey = 'question';

		$this->apiModel = new QuestionModel();

		$this->config = (object) [
			'pathView'  => 'admin/configuration/question',
			'urlAction' => 'admin/configuration/question',
			'toView' => [
				'header' => 'layouts.header',
				'group_page'  => 'Configurações',
				'url_group'   => '#',
				'module_page' => 'Perguntas',
				'url_page'    => 'admin/configuration/question',
			],
		];
	}

	public function list(Request $request)
	{
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$this->config->toView['headerBtn'] = [
			(object) [
				'url' => 'admin/configuration/question/insert',
				'class' => 'btn-primary',
				'iconClass' => 'fa fa-plus',
				'label' => 'Novo',
			],
		];

		$dataTable = new \stdClass();

		$list = $this->apiModel;

		$dataTable->data = $list->get();

		// $dataTable->header = getShowListFields(['table' => $this->apiModel->getTable(), 'idUser' => $request->user()->id,]);
		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Pergunta',
				'column' => 'title',
			],
		];

		return parent::list($request)
		->with('dataTable', $dataTable);
	}

	public function insert(Request $request)
	{
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Cadastro de Pergunta';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente a pergunta.';


		return parent::insert($request);
	}

	public function update(Request $request)
	{
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Alteração da Pergunta';
		$this->config->toView['subtitle'] = 'Altere todas as informações referente a pergunta.';

		$view = parent::update($request);

		$view->data->alternatives = AlternativeModel::where('question_id', $request->id)->get();

		return $view;
	}

	public function save(Request $request)
	{
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$save = parent::save($request);

		$extractData = function ($data, &$dataExtract) use ($save, $request) {
			$order = 1;

			foreach ($data as $value) {
				if (empty($value['title'])) {
					continue;
				}

				$toSave = [
					'question_id' => $save->data->id,
					'title' => $value['title'],
					'flg_type' => $request->flg_type,
					'order' => $order++,
				];

				if (isset($value['id']) && !empty($value['id'])) {
					$toSave['id'] = $value['id'];

					$dataExtract['upd'][] = $toSave;
				} else {
					$dataExtract['ins'][] = $toSave;
				}
			}
		};

		if (in_array($request->flg_type, ['2', '3'])) {

			$alternatives = [
				'ins' => [],
				'upd' => [],
			];

			$extractData($request->alternative[$request->flg_type], $alternatives);

			if (count($alternatives['ins'])) {
				AlternativeModel::insert($alternatives['ins']);
			}

			if (count($alternatives['upd'])) {
				for ($i = 0, $ii = count($alternatives['upd']); $i < $ii; $i++) {
					$data = $alternatives['upd'][$i];

					AlternativeModel::where('id', $data['id'])->update($data);
				}
			}
		}

		return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
	}

	public function alternativeRemove(Request $request)
	{
		$data = AlternativeModel::find($request->id);

		if (!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		return $data->delete();
	}
}
