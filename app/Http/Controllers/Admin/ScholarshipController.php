<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseMethodController;
use App\Model\api\AvaliationModel;
use App\Model\api\Configuration\StateModel;
use App\Model\api\ScholarshipDiscountModel;
use App\Model\api\ScholarshipModel;
use App\Model\api\ScholarshipStudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ScholarshipController extends BaseMethodController {

	function __construct() {
		$this->pageKey = 'scholarship';

		$this->apiModel = new ScholarshipModel();

		$this->config = (object) [
			'pathView' => 'admin/scholarship',
			'urlAction' => 'admin/scholarship',
			'toView' => [
				'header' => 'layouts.header',
				'module_page' => 'Bolsas de Estudo',
				'url_page' => 'admin/scholarship',
			],
		];
	}

	public function list(Request $request) {
		$dataTableInative = new stdClass();
		$dataTableActive = new stdClass();

		$dataTableInative->id = 'dataTablesScholarshipInative';
		$dataTableActive->id = 'dataTablesScholarship';

		$dataTableInative->opts =
		$dataTableActive->opts = [
			'order' => [
				[ 4, 'desc' ],
			],
		];

		$dataTableInative->header =
		$dataTableActive->header = [
			[ 'title' => 'ID', 'data' => 'id', ],
			[ 'title' => 'Título', 'data' => 'title', ],
			[ 'title' => 'Descrição', 'data' => 'description', ],
			[ 'title' => 'Data Inicial', 'data' => 'registration_start_date', ],
			[ 'title' => 'Data Final', 'data' => 'registration_end_date', 'data-order' => 'endDate' ],
		];

		$dataTableInative->header[] = [ 'title' => '', 'className' => 'center', 'btnDel' => "/{$this->config->urlAction}" ];

		$dataTableActive->header = array_merge($dataTableActive->header, [
			[ 'title' => '', 'className' => 'center', 'btnEnr' => "/{$this->config->urlAction}" ], // Enrolled
			[ 'title' => '', 'className' => 'center', 'btnRan' => "/{$this->config->urlAction}" ], // Ranking
			[ 'title' => '', 'className' => 'center', 'btnUpd' => "/{$this->config->urlAction}" ],
			[ 'title' => '', 'className' => 'center', 'btnDel' => "/{$this->config->urlAction}" ],
		]);

		$dataModel = $this->apiModel::query();

		// $dataModel->with([ 'courseCategoryType' ]); juntar tabelas

		$dataTableActive->data = $dataModel->get();
		$dataTableInative->data = $dataModel->onlyTrashed()->get();

		return parent::list($request)->with([
			'dataTableActive' => $dataTableActive,
			'dataTableInative' => $dataTableInative,
		]);
	}

	public function save(Request $request){

		$request['course_category_type_id'] = $request['type'];
		$request['course_category_id'] = $request['category'];
		$request['course_subcategory_id'] = $request['subcategory'];
		$request['course_id'] = $request['course'];
		$request['class_id'] = $request['class'];

		$request->paramsConfig = [
			'redirectBack' => false,
		];

		$scholarship = parent::save($request);

		$scholarshipDiscounts = $request['scholarshipDiscount'];

		foreach ($scholarshipDiscounts as &$scholarshipDiscount) {
			$scholarshipDiscount = new ScholarshipDiscountModel($scholarshipDiscount);
		}

		$scholarship->data->scholarshipDiscount()->delete();
		$scholarship->data->scholarshipDiscount()->saveMany($scholarshipDiscounts);

		return redirect("/{$this->config->urlAction}");
	}

	public function insert(Request $request){
		$title = 'Inserir';
		$evaluations = AvaliationModel::where('avaliation_type_id', 6)->get();

		return parent::insert($request)->with(['title' => $title, 'evaluations' => $evaluations]);
	}

	public function update(Request $request){
		$this->data = $this->apiModel::with('scholarshipDiscount')->find($request->id)->toArray();
		$title = 'Alterar';
		$evaluations = AvaliationModel::where('avaliation_type_id', 6)->get();

		return parent::update($request)->with(['title' => $title, 'evaluations' => $evaluations]);
	}

	public function rankingOrEnrolled(Request $request, $rankingOrEnrolled, $id){
		$this->config->fileView = 'rankingOrEnrolled';
		$this->config->toView = array_merge([
			'title_page' => ($rankingOrEnrolled == 'ranking') ? 'Classificação dos Candidatos' : 'Inscritos',
		], $this->config->toView);

		$title = ($rankingOrEnrolled == 'enrolled') ? 'Inscritos' : 'Ranking';
		$subtitle = ($rankingOrEnrolled == 'enrolled') ? 'Inscritos na' : 'Classificação dos Candidatos à';

		$scholarship = ScholarshipModel::find($id);

		$scholarshipStudent = ScholarshipStudentModel::selectRaw('(@row_number := @row_number + 1) AS `rank`, scholarship_student.*')
		->join(DB::raw('(SELECT @row_number := 0) r'), DB::raw('1'), DB::raw('1'))
		->where('scholarship_id', $id)
		->with([
			'scholarshipStudentStatus',
			'student',
		])
		->orderByDesc('proficiency_note')
		->orderByDesc('socio_economic_note');
		// Tabela de Listagem

		$dataTableInative = new stdClass();
		$dataTableActive = new stdClass();

		$dataTableInative->id = 'dataTablesScholarshipInative';
		$dataTableActive->id = 'dataTablesScholarship';

		$dataTableInative->header =
		$dataTableActive->header = [
			[ 'title' => 'Classificação', 'data' => 'rank', 'width' => '100px' ],
			[ 'title' => 'ID', 'data' => 'id', 'width' => '30px' ],
			[ 'title' => 'Nome', 'data' => 'student.name', ],
			[ 'title' => 'Nota Proeficiência', 'data' => 'proficiency_note', 'width' => '120px' ],
			[ 'title' => 'Nota Socioeconômica', 'data' => 'socio_economic_note', 'width' => '140px' ],
			($rankingOrEnrolled == 'ranking') ? [
				'title' => 'Status',
				'data' => 'scholarship_student_status.name',
			] : [
				'title' => '',
				'className' => 'center',
				'btnTest' => "/{$this->config->urlAction}",
			],
		];

		if ($rankingOrEnrolled == 'enrolled') {
			$dataTableActive->header[] = [ 'title' => '', 'className' => 'center', 'btnProfile' => "/{$this->config->urlAction}" ];

			array_splice($dataTableActive->header, 5, 0, [ [ 'title' => 'Status Pgto.', 'data' => 'paymentStatus', ] ]);
			array_splice($dataTableInative->header, 5, 0, [ [ 'title' => 'Status Pgto.', 'data' => 'paymentStatus', ] ]);
		} else {
			$scholarshipStudent->whereNotNull('payment_date');

			// Opção de aprovação da bolsa
			// array_splice($dataTableActive->header, 6, 0, [
			// 	[
			// 		'title' => 'Aprovar <i class="fas fa-thumbs-up"/> | Desaprovar <i class="far fa-thumbs-up"/>',
			// 		'width' => '200px',
			// 		'className' => 'center',
			// 		'renderDoT' => "<a href='/{$this->config->urlAction}/student/approve/{{= it.row.id }}'>
			// 			<i class='{{= it.row.to_approve ? 'fas' : 'far' }} fa-thumbs-up' title='{{= it.row.to_approve ? 'Desaprovar' : 'Aprovar' }}' style='font-size:1.3em'></i>
			// 		</a>",
			// 	],
			// ]);
		}

		$dataTableActive->header[] =
		$dataTableInative->header[] = [
			'title' => '',
			'className' => 'center',
			'btnDel' => "/{$this->config->urlAction}/student",
		];

		$dataTableActive->data = $scholarshipStudent->get();
		$dataTableInative->data = $scholarshipStudent->onlyTrashed()->get();

		return parent::list($request)->with([
			'scholarship' => $scholarship,
			'dataTableActive' => $dataTableActive,
			'dataTableInative' => $dataTableInative,
			'title' => $title,
			'subtitle' => $subtitle,
		]);
	}

	public function viewProfile(Request $request){
		$this->config->fileView = 'profile';

		$this->data = ScholarshipStudentModel::query()
		->with([
			'scholarshipStudentStatus',
			'student',
			'studentSocioeconomic',
		])
		->find($request->id)->toArray();

		$title = 'Alterar';

		$states = StateModel::get();

		return parent::update($request)->with([
			'title' => $title,
			'payload' => [
				'states' => $states,
			]
		]);
	}

	public function test(Request $request){
		$scholarshipStudent = ScholarshipStudentModel::with([ 'scholarship.avaliation', 'student' ])->find($request->id);

		return view($this->config->pathView . '/test')->with([
			'scholarshipStudent' => $scholarshipStudent,
			'urlAction' => '/' . $this->config->urlAction,
			'header' => 'layouts.header',
			'module_page' => 'Bolsas de Estudo',
			'title_page' => 'Prova do Candidato',
			'url_page' => 'admin/scholarship',
			'fileView' => '',
		]);
	}

	public function studentDelete(Request $request, $id) {
		$this->apiModel = ScholarshipStudentModel::class;

		return parent::delete($request, $id);
	}

	public function studentEnable(Request $request, $id) {
		$this->apiModel = ScholarshipStudentModel::class;

		return parent::enable($request, $id);
	}

	public function studentToApprove($id) {
		$scholarshipStudent = ScholarshipStudentModel::find($id);

		if ($scholarshipStudent) {
			$scholarshipStudent->fill([ 'to_approve' => $scholarshipStudent->to_approve ? null : 1 ])->save();
		}

		return redirect()->back();
	}
}
