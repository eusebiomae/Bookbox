<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\Configuration\BlogCategoryModel;
use App\Model\api\CorrespondingCourseCategoryModel;
use App\Model\api\Prospection\CourseCategoryModel;

class BlogCategoryController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'blogCategory';

		$this->apiModel = new BlogCategoryModel();

		$this->config = (object) [
			'pathView' => 'admin/configuration/blog/category',
			'urlAction' => 'admin/configuration/blog/category',
		];
	}

	private function getListSelectBox()
	{
		$list = (object) [];

		$list->courseCategory = CourseCategoryModel::orderBy('description_pt')->get();

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = BlogCategoryModel::withTrashed()->get();

		$dataTable->header = [
			(object) [
				'label' => 'ID',
				'column' => 'id',
			],
			(object) [
				'label' => 'Tipo',
				'column' => 'label_flg_type',
			],
			(object) [
				'label' => 'Descrição',
				'column' => 'description_pt',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	public function insert(Request $request) {
		$this->config->toView['listSelectBox'] = $this->getListSelectBox();

		return parent::insert($request);
	}

	public function update(Request $request) {
		$this->config->toView['listSelectBox'] = $this->getListSelectBox();

		$view = parent::update($request);

		return $view
		->with('correspondingCourseCategory', CorrespondingCourseCategoryModel::where('blog_category_id', $view->data['id'])->get());
	}

	function save(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$save = parent::save($request);

		$save->data->courseCategory()->sync($request->get('correspondingCourseCategory'));

		if ($save->action === 'I') {
			return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
		} else {
			return redirect()->back();
		}
	}
}
