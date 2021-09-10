<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\UserModel;
use App\Model\api\UserProfileModel;

class UserController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'user';
		$this->apiModel = new UserModel();

		$this->config = (object) [
			'pathView' => 'admin/user',
			'urlAction' => 'admin/user',
			'toView' => [
				'header' => 'layouts.header',
				'group_page' => 'Usuário',
				'url_group' => '#',
				'module_page' => 'Usuário',
				'url_page' => 'admin/user',
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->userProfile = UserProfileModel::orderBy('desc')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$listSelectBox = $this->getListSelectBox();

		$dataTable = new \stdClass();
		$dataTable->data = UserModel::withTrashed()->orderBy('name')->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Nome',
				'column' => 'name',
			],
			(object) [
				'label' => 'Login',
				'column' => 'user_name',
			],
			(object) [
				'label' => 'Autor',
				'column' => 'author',
			],
			(object) [
				'label' => 'Tipo',
				'column' => 'user_type_id',
			],
			(object) [
				'label' => 'Vendedor',
				'column' => 'consultant',
			],
			(object) [
				'label' => 'Contato',
				'column' => 'contact_site',
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
		$this->config->toView['title'] = 'Cadastrar Usuário';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao usuário do sistema.';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	public function update(Request $request) {
		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Editar Usuário';
		$this->config->toView['subtitle'] = 'Edite todas as informações referente ao usuário do sistema.';

		$listSelectBox = $this->getListSelectBox();

		$view = parent::update($request);

		return $view
			->with('listSelectBox', $listSelectBox);
	}

	function save(Request $request) {
		if (!empty($request->password)) {
			$request['password'] = Hash::make($request->password);
		} else {
			unset($request['password']);
		}

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$path = $request->file('fileImage')->move('storage/user', $fileName);
			$request['image'] = $fileName;
		}

		return parent::save($request);
	}
}
