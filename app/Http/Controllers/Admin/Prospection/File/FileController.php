<?php

namespace App\Http\Controllers\Admin\Prospection\File;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\FileContentCourseModel;
use App\Model\api\Prospection\ContentCourseModel;
use App\Model\api\Prospection\FileModel;
use App\Model\api\Prospection\CourseModel;

use File;
use Illuminate\Support\Facades\Storage;

class FileController extends BaseMethodController {

  function __construct() {
		$this->pageKey = 'file';

		$this->pathFile = 'storage/file';
		$this->apiModel = new FileModel();

		$this->config = (object) [
			'pathView' => 'admin/prospection/file',
			'urlAction' => 'admin/prospection/file',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Arquivos',
				'url_group' => '#',
				'module_page' => 'Upload',
				'url_page' => 'admin/prospection/file',
				'pathFile' => $this->pathFile,
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->contentCourse = ContentCourseModel::all();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$listSelectBox = $this->getListSelectBox();

		$dataTable = new \stdClass();
		$dataTable->data = FileModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Titulo',
				'column' => 'title',
			],
			// (object) [
			// 	'label' => 'Subtitulo',
			// 	'column' => 'subtitle',
			// ],
			(object) [
				'label' => 'Nome arquivo',
				'column' => 'name',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request)
		->with('listSelectBox', $listSelectBox);
	}

	public function insert(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Ficha cadastral do Aluno';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao aluno em um único lugar.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Ficha de edição do Aluno';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao aluno em um único lugar.';

		$listSelectBox = $this->getListSelectBox();

		$view = parent::update($request);

		$view->data['contentCourse'] = FileContentCourseModel::getIDsModule($view->data['id']);

		return $view->with('listSelectBox', $listSelectBox);
	}

	public function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!empty($request->file('fileImage'))) {

			$request['extension'] = $request->file('fileImage')->getClientOriginalExtension();

			if (empty($request->name)) {
				$request['name'] = preg_replace("/\.{$request['extension']}$/", '', $request->file('fileImage')->getClientOriginalName());
			}

			$fileName = time() . uniqid() . '.' . $request['extension'];

			$request->file('fileImage')->move($this->pathFile, $fileName);
			$request['link'] = $fileName;
		}

		$save = parent::save($request);

		$save->data->contentCourse()->sync($request->contentCourse);

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}

	public function download(Request $request, $fileName) {
		$pathFile = base_path('public' . Storage::url("file/{$fileName}"));

		$file = $this->apiModel::where('link', $fileName)->first();

		if (file_exists($pathFile)) {
			return response()->download($pathFile, "{$file->name}.{$file->extension}");
		} else {
			return response(null, 404);
		}
	}

	public function avaliationFile($orderId, $avaliationId, $fileName) {
		$path = implode('/', [ 'avaliation_file', $orderId, $avaliationId, $fileName ]);

		return Storage::download($path);
	}
}
