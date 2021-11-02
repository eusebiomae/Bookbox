<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\TeamModel;

use App\Model\api\Configuration\FunctionModel;
use App\Model\api\Configuration\GraduationModel;
use App\Model\api\Configuration\OfficeModel;
use App\Model\api\Configuration\EnglishLevelModel;

class TeamController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'team';

		$this->apiModel = new TeamModel();

		$this->config = (object) [
			'pathView' => 'admin/team',
			'urlAction' => 'admin/configurationTeam/team',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->function = FunctionModel::all();
		$list->graduation = GraduationModel::all();
		$list->office = OfficeModel::all();
		$list->englishLevel = EnglishLevelModel::all();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = TeamModel::withTrashed()->with([
			'graduation', 'function', 'office',
		])->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Nome',
				'column' => 'name',
			],
			// (object) [
			// 	'label' => 'Graduação',
			// 	'column' => 'graduation.description_pt',
			// ],
			// (object) [
			// 	'label' => 'Função',
			// 	'column' => 'function.description_pt',
			// ],
			// (object) [
			// 	'label' => 'Cargo',
			// 	'column' => 'office.description_pt',
			// ],
			(object) [
				'label' => 'Função',
				'column' => 'crp',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		return parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function save(Request $request) {
		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/team', $fileName);
			$request['image'] = $fileName;

		}

		return parent::save($request);
	}

}
