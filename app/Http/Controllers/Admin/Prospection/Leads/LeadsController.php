<?php

namespace App\Http\Controllers\Admin\Prospection\Leads;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseMethodSystemController;
use App\Model\api\Configuration\AnswerModel;
use App\Model\api\Configuration\BankModel;
use App\Model\api\Prospection\LeadsModel;
use App\Model\api\Prospection\LeadsPhoneCallModel;

use App\Model\api\Configuration\StateModel;
use App\Model\api\Configuration\LeadsStatusModel;
use App\Model\api\CourseFormPaymentModel;
use App\Model\api\FormPaymentModel;
use App\Model\api\OrderModel;
use App\Model\api\Prospection\CourseCategoryModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\ResponsibleSellerModel;
use App\Model\api\StudentModel;
use App\Model\api\UserModel;
use App\Model\ConfigAppModel;
use stdClass;

class LeadsController extends BaseMethodSystemController {

	function __construct() {
		$this->pageKey = 'leads';

		$this->pathFile = 'storage/student';
		$this->pathView = 'admin.prospection.student';
		$this->apiModel = StudentModel::class;

		$this->config = (object) [
			'pathView'  => $this->pathView,
			'urlAction' => 'admin/prospection/prospect',
			'toView' => [
				'header' => 'layouts.header',
				'group_page'  => 'Gestão Clientes',
				'url_group'   => '#',
				'module_page' => 'Leads',
				'url_page'    => 'admin/prospection/prospect',
			],
		];
	}

	private function updateTypeUrl(Request $request) {
		switch ($request->flg_type) {
			case 'PX':
				$this->config->urlAction = $this->config->toView['url_page'] = 'admin/prospection/prospect_hot';
				$this->config->toView['module_page'] = 'Leads Quentes';
				break;
			case 'C':
				$this->config->urlAction = $this->config->toView['url_page'] = 'admin/prospection/client';
				$this->config->toView['module_page'] = 'Clientes';
				break;
			case 'X':
				$this->config->urlAction = $this->config->toView['url_page'] = 'admin/prospection/former_client';
				$this->config->toView['module_page'] = 'Ex clientes';
				break;
		}
	}

	private function getListSelectBox() {
		$list = new stdClass;

		return $list;
	}

	public function list(Request $request) {
		$this->config->fileView = 'list';
		$this->config->toView['title_page'] = 'Listar';
		$this->config->toView['url_page_action'] = '';
		$this->updateTypeUrl($request);

		$dataTableInative = new stdClass();
		$dataTableActive = new stdClass();

		$dataTableInative->id = 'dataTablesLeadsInative';
		$dataTableActive->id = 'dataTablesLeads';

		$dataTableInative->header =
		$dataTableActive->header = [
			[ 'title' => 'ID', 'data' => 'id', ],
			[ 'title' => 'Nome', 'data' => 'name', ],
			[ 'title' => 'CPF', 'data' => 'cpf', ],
			[ 'title' => 'E-mail', 'data' => 'email', ],
			[ 'title' => '', 'className' => 'center', 'btnUpd' => '/admin/prospection/' . $request->flgType ],
			[ 'title' => '', 'className' => 'center', 'btnDel' => '/admin/prospection/' . $request->flgType ],
		];

		$studentModel = $this->apiModel::query();

		switch ($request->flg_type) {
			case 'PH':
				$studentModel->whereRaw("(SELECT value FROM `order` WHERE student_id = student.id AND status = 'AP' AND deleted_at IS NULL ORDER BY value DESC LIMIT 1) = 0");
				break;
			case 'P':
				$studentModel->whereDoesntHave('order');
				break;
			case 'C':
				$studentModel->where(function($query) {
					$query
						->select(['value'])
						->from('order')
						->whereRaw('student_id = student.id')
						->where('status', 'AP')
						->whereNull('deleted_at')
						->orderBy('value', 'desc')
						->limit(1);
				}, '>', 0);
				break;
			case 'X':
				$studentModel->whereHas('order', function($query) {
					$query->where('status', '!=', 'AP');
				});
				break;
		}

		// return  $studentModel->toSql();
		$dataTableActive->data = $studentModel->get();
		$dataTableInative->data = $studentModel->onlyTrashed()->get();

		return parent::list($request)->with([
			'dataTableActive' => $dataTableActive,
			'dataTableInative' => $dataTableInative,
			]);
	}

	public function insert(Request $request) {
		$this->updateTypeUrl($request);
		$showFormFields = (new ConfigAppModel())->getShowFormFields('leads', $request->user()->id, $this->apiModel->fillable);

		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Inserir';
		$this->config->toView['url_page_action'] = '/insert';
		$this->config->toView['title'] = 'Ficha cadastral do Aluno';
		$this->config->toView['subtitle'] = 'Cadastre todas as informações referente ao aluno em um único lugar.';

		$listSelectBox = $this->getListSelectBox();
		$listSelectBox['usersConsultant'] = UserModel::where('consultant', 'S')->get();
		$listSelectBox['leadsStatus'] = LeadsStatusModel::all();

		return parent::insert($request)
			->with('listSelectBox', $listSelectBox)
			->with(
				'configApp',
				(object) [
					'showFormFields' => $showFormFields,
				]
			);
	}

	public function update(Request $request) {
		$this->updateTypeUrl($request);

		$this->config->fileView = 'form';
		$this->config->toView['title_page'] = 'Editar';
		$this->config->toView['url_page_action'] = '/update';
		$this->config->toView['title'] = 'Alterar a Inscrição';
		$this->config->toView['subtitle'] = 'Edite informações referente a Inscrição.';

		return view('admin/prospection/registration/form')
		->with('payload', (object) [
			'student' => StudentModel::find($request['id']),
			'states' => StateModel::orderBy('abbreviation')->get(),
			'orders' => OrderModel::whereNotNull('course_id')
				->where('student_id', $request['id'])
				->with([
					'course.courseCategoryType',
					'course.courseCategory',
					'course.courseSubcategory',
					'class',
				])->get(),
		]);;
	}

	public function save(Request $request) {
		$this->updateTypeUrl($request);

		$request->paramsConfig = [
			'redirectBack' => false,
		];

		if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move($this->pathFile, $fileName);
			$request['img'] = $fileName;
		}

		if (!isset($request->is_formed_in_psychology)) {
			$request['is_formed_in_psychology'] = null;
		}

		$save = parent::save($request);

		$save->data->seller()->sync($request->get('responsibleSeller') ? $request->get('responsibleSeller') : []);

		return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
	}

	public function phoneContactList(Request $request) {
		$leadsPhoneCallModel = new LeadsPhoneCallModel;
		$dataTable = new \stdClass();
		$dataTable->data = $leadsPhoneCallModel->with('answers.question')->withTrashed()->where('leads_id', $request->id)->get();
		$dataTable->header = (new ConfigAppModel())->getShowListFields($leadsPhoneCallModel->getTable(), $request->user()->id);
		$dataTable->dataHidden = true;

		return [
			'url_page' => 'admin/prospection/prospect/phone_contact',
			'modal' => true,
			'data_target_modal' => 'myModal',
			'dataTable' => $dataTable,
			'questions' => $leadsPhoneCallModel->getQuestions(),
		];
	}

	public function phoneContactSave(Request $request) {
		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$this->apiModel = new LeadsPhoneCallModel();

		$save = parent::save($request);

		$question = $request->get('question');

		if ($question) {
			$questionAnswer = [];

			foreach ($question as $questionId => $alternative) {
				foreach ($alternative as $flgType => $answer) {
					switch ($flgType) {
						case '1':
						case '2':
						case '4':
							$questionAnswer[] = [
								'leads_phone_call_id' => $save->data->id,
								'question_id' => $questionId,
								'answer' => $answer,
							];
							break;
						case '3':
							for ($i= count($answer) - 1; $i > -1 ; $i--) {
								$questionAnswer[] = [
									'leads_phone_call_id' => $save->data->id,
									'question_id' => $questionId,
									'answer' => $answer[$i],
								];
							}
							break;
					}
				}
			}

			AnswerModel::where('leads_phone_call_id', $save->data->id)->delete();
			AnswerModel::insert($questionAnswer);
		}

		return redirect()->back();
	}

	function phoneContactDelete(Request $request, $id) {
		$data = LeadsPhoneCallModel::find($id);

		if (!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		$data->delete();

		return redirect()->back();
	}

	function phoneContactEnable(Request $request, $id) {
		$data = LeadsPhoneCallModel::withTrashed()->find($id);

		if (!$data) {
			return response()->json([
				'message'   => 'Record not found',
			], 404);
		}

		$data->restore();

		return redirect()->back();
	}

	public function getJson(Request $request) {
		$list = LeadsModel::where('flg_type', $request->flg_type)
			->with('leadsVisit')
			->with('leadsVisit.course')
			->with('leadsVisit.consultant')
			->get();

		return $list;
	}

	public function getDataTables(Request $request) {
		$list = LeadsModel::withTrashed()->with(['course', 'courseCategory'])->where('flg_type', $request->flg_type);

		if ($request->get('is_formed_in_psychology') == '1') {
			$list->where('is_formed_in_psychology', $request->get('is_formed_in_psychology'));
		} else
		if ($request->get('is_formed_in_psychology') == '0') {
			$list->whereNull('is_formed_in_psychology');
		}

		if (!empty($request->get('course_category'))) {
			$list->where('course_category_id',  $request->get('course_category'));
		}

		if (!empty($request->get('course'))) {
			$list->where('course_id',  $request->get('course'));
		}

		if (empty($request->get('course')) && empty($request->get('is_formed_in_psychology'))) {
			$list->whereRaw('created_at > CURRENT_DATE - INTERVAL 12 MONTH');
		}

		return [ 'data' => $list->get() ];
	}

	public function import(Request $request) {
		set_time_limit(3600);
		if ($request->file('import')) {

			$dataXlsx = normalizeDataSpreadsheet($request->file('import'));
			$header = [];

			foreach ($dataXlsx['header'] as $idx => $label) {
				if (preg_match('/nome/i', $label)) {
					$header[$idx] = 'student_name';
				} elseif (preg_match('/email|e[ _-]mail/i', $label)) {
					$header[$idx] = 'email';
				} elseif (preg_match('/whatsapp/i', $label)) {
					$header[$idx] = 'whatsapp';
				} elseif (preg_match('/telefone/i', $label)) {
					$header[$idx] = 'phone';
				} elseif (preg_match('/cidade/i', $label)) {
					$header[$idx] = 'city';
				} elseif (preg_match('/formado.+em.psicologia/i', $label)) {
					$header[$idx] = 'is_formed_in_psychology';
				} elseif (preg_match('/(n(i|í)vel).interesse/i', $label)) {
					$header[$idx] = 'level_of_interest';
				}
			}

			$sellers = UserModel::where('consultant', 'S')->get();
			$sellersCount = count($sellers);

			// $rows = [];
			for ($i = 0, $ii = count($dataXlsx['rows']); $i < $ii; $i++) {
				$row = $dataXlsx['rows'][$i];
				$data = [];

				foreach ($header as $idx => $column) {
					$value = $row[$idx];

					switch ($column) {
						case 'whatsapp':
						case 'phone':
							$value = preg_replace('/\D/', '', $value);
							break;
						case 'is_formed_in_psychology':
							$value = preg_match('/sim/i', $value) ? 1 : null;
							break;
						case 'level_of_interest':
							$value = preg_match('/im(é|e)diato/i', $value, $matches) ? 1 : (preg_match('/futuro/i', $value) ? 2 : (preg_match('/n(a|ã)o.sei.responder/i', $value) ? 3 : null));
							break;
					}

					$data[$column] = $value;
				}

				if (isset($data['email']) && !LeadsModel::where('email', $data['email'])->whereOr('commercial_email', $data['email'])->exists()) {
					$data['course_category_id'] = $request->course_category;
					$data['flg_type'] = $request->flg_type;
					// $rows[] = $this->normalizeToSave($data);
					$lead = LeadsModel::create($this->normalizeToSave($data));
					$lead->seller()->sync([ $sellers[rand(0, $sellersCount - 1)]->id ]);
				}
			}

			// if (count($rows)) {
			// 	$this->apiModel->insert($rows);
			// }
		}

		return redirect()->back();
	}

	public function existsEmail(Request $request) {

		$dao = LeadsModel::where('email', $request->email)->whereOr('commercial_email', $request->email);

		if (isset($request->id)) {
			$dao->where('id', '!=', $request->id);
		}

		$data = $dao->first();

		return $data ? $data->id : null;
	}
}
