<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseMethodAdminController;
use App\Model\api\AvaliationModel;
use App\Model\api\Prospection\ClassModel;
use App\Model\api\QuestionModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryTypeModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\Prospection\CourseSubcategoryModel;
use App\Model\api\SlideModel;
use App\Model\api\AvaliationTypeModel;
use Illuminate\Http\Request;

class AvaliationController extends BaseMethodAdminController
{

	function __construct()
	{
		$this->pageKey = 'avaliation';
		$this->apiModel = AvaliationModel::class;
		$this->config = (object) [
			'urlBase' => '/admin/avaliation',
			'urlAction' => '/admin/avaliation/save',
			'pathView'  => 'admin.pages.avaliation',
			'pathViewInclude'  => 'admin.pages.avaliation.form',
			'header' => 'admin.layouts.header',
			'breadcrumbs' => [
				[
					'url' => '/admin',
					'label' => 'Home',
				],
				[
					'label' => 'Gestão Site',
				],
				[
					'url' => '/admin/avaliation',
					'label' => 'Avaliações',
				],
			],
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->courseCategoryType = CourseCategoryTypeModel::all();
		$list->courseCategory = CourseCategoryModel::all();
		$list->courseSubcategory = CourseSubcategoryModel::all();
		$list->course = CourseModel::all();
		$list->class = ClassModel::all();
		$list->slide = SlideModel::all();
		$list->questions = QuestionModel::with('alternative')->get();
		$list->avaliationType = AvaliationTypeModel::all();

		return $list;
	}

	public function list(Request $request) {
		$this->config->pathView = 'admin.components';
		$this->config->fileView = '.list';
		$this->config->title = 'Listar Avaliações';
		$this->config->contentTitle = 'Lista de Avaliações';
		$this->config->breadcrumbs[] = [ 'label' => 'Listar' ];

		$dataTableHeader = [
			[ 'title' => 'ID', 'data' => 'id', 'width' => '10px', ],
			[ 'title' => 'Nome', 'data' => 'title', ],
			[ 'title' => 'Tipo de Avaliação', 'data' => 'avaliation_type.name', ],
			[ 'title' => 'Categoria', 'data' => 'category.description_pt', ],
			[ 'title' => 'Data', 'data' => 'date', ],

			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnUpd' => $this->config->urlBase ],
			[ 'title' => '', 'className' => 'center', 'width' => '10px', 'btnDel' => $this->config->urlBase ],
		];

		return parent::list($request)
		->with('dataTable', parent::getListEnableDisable((object) [
			'dataTableHeader' => $dataTableHeader,
			'apiModel' => $this->apiModel::query()->with([
				'category',
				'avaliationType',
			]),
		]));
	}

	function insert(Request $request) {
		$this->config->title = 'Cadastro de Avaliação';
		$this->config->contentTitle = 'Cadastre todas as informações referente a Avaliação.';
		$this->config->breadcrumbs[] = [ 'label' => 'Inserir' ];

		$listSelectBox = $this->getListSelectBox();

		$listSelectBox->avaliation = AvaliationModel::where('avaliation_type_id', 1)->get();

		return parent::insert($request)
		->with('listSelectBox', $listSelectBox);
	}

	function update(Request $request) {
		$this->config->title = 'Editar Avaliação';
		$this->config->contentTitle = 'Alterar Avaliação';
		$this->config->breadcrumbs[] = [ 'label' => 'Editar' ];

		$listSelectBox = $this->getListSelectBox();

		$listSelectBox->avaliation = AvaliationModel::where('avaliation_type_id', 1)->where('id', '!=', $request->id)->get();

		$view = parent::update($request)
		->with('payload', [
			'data' => $this->apiModel::with([
				'question.alternative',
			])->find($request->id),
		])
		->with('listSelectBox', $listSelectBox);

		return $view;
	}

	public function save(Request $request)
	{
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$save = parent::save($request);

		$save->question()->sync($request->get('question'));

		return redirect($this->config->urlBase);
	}

}
