<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;
use App\Model\api\EventModel;

use App\Model\api\Configuration\CalendarModel;
use App\Model\api\Configuration\CalendarPrivacyModel;
//use App\Model\api\Configuration\AulaStatusModel;

class EventController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'event';

		$this->apiModel = new EventModel();

		$this->config = (object) [
			'pathView' => 'admin/event',
			'urlAction' => 'admin/event',
		];
	}

	private function getListSelectBox() {
		$list = (object) [];

		$list->calendar = (new CalendarModel())->get();
		$list->calendarPrivacy = (new CalendarPrivacyModel())->get();

		return $list;
	}

	// function index() {
	// 	$data = $this->apiModel->get();

	// 	for ($i = count($data) - 1; $i > -1; $i--) {
	// 		$item = &$data[$i];

	// 		$date = explode(' ', $item->event_datetime);

	// 		$item->event_date = preg_replace('/(\d{4})-(\d{2})-(\d{2})/', '$3/$2/$1', $date[0]);
	// 		$item->event_time = $date[1];
	// 	}

	// 	unset($item);

	// 	return view($this->pathView . '/index')
	// 	->with('data', $data);
	// }

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';

		$dataTable = new \stdClass();
		$dataTable->data = EventModel::withTrashed()->get();

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
				'label' => 'Data',
				'column' => 'event_date',
			],
			(object) [
				'label' => 'Hora',
				'column' => 'event_time',
			],
			(object) [
				'label' => 'Local',
				'column' => 'localization',
			],
			(object) [
				'label' => 'Calendário',
				'column' => 'calendar_id',
			],
			(object) [
				'label' => 'Privacidade',
				'column' => 'calendar_privacy_id',
			],
			(object) [
				'label' => 'Aula Status',
				'column' => 'class_status_id',
			],
			(object) [
				'label' => 'Reperir Todo ano',
				'column' => 'annual_repeat',
			],
		];

		$this->config->toView['dataTable'] = $dataTable;

		return parent::list($request);
	}

	function insert(Request $request) {
		$this->apiModel->fillable[] = 'event_date';
		$this->apiModel->fillable[] = 'event_time';

		return parent::insert($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function update(Request $request) {
		$this->apiModel->fillable[] = 'event_date';
		$this->apiModel->fillable[] = 'event_time';

		return parent::update($request)
		->with('listSelectBox', $this->getListSelectBox());
	}

	function save(Request $request) {
		$input = $request->all();

		$date = empty($input['event_date']) ? null : preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$2-$1', $input['event_date']);
		$time = empty($input['event_time']) ? '00:00' : $input['event_time'];

		$request['event_datetime'] = "{$date} {$time}:00";

		return parent::save($request);
	}

}
