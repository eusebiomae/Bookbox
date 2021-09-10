<?php

namespace App\Http\Controllers\Admin\Prospection\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;

use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\IncludedItemsModel;
use File;

class IncludedItemsController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'includedItems';

		$this->pathFile = 'storage/includedItems';
		$this->apiModel = new IncludedItemsModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/includedItems',
			'urlAction' => 'admin/prospection/included_items',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Cursos',
				'url_group' => '#',
				'module_page' => 'Itens Inclusos do Curso',
				'url_page' => 'admin/prospection/included_items',
				'pathFile' => $this->pathFile,
			],
		];
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = IncludedItemsModel::withTrashed()->get();
		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Título',
				'column' => 'title_pt',
			],
			(object) [
				'label' => 'Subtítulo',
				'column' => 'subtitle_pt',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Ficha cadastral do Itens Inclusos';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao Itens Inclusos do Curso.';

		return parent::insert($request);
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Ficha de edição do Itens Inclusos';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao Itens Inclusos do Curso';

		$view = parent::update($request);

		return $view;
	}

	public function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move($this->pathFile, $fileName);
			$request['img'] = $fileName;
		}

		$save = parent::save($request);

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

}
