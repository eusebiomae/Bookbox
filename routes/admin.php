<?php

use App\Model\api\AvaliationStudentModel;
use App\Model\api\ScholarshipStudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Auth::routes();
// Login
Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
// Password reset routes
Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::group([ 'middleware' => [ 'auth:admin', ] ], function() {

	/*
	Route::group(['prefix' => 'ays'], function() {
		Route::get('pass/{pass}', function($pass) { return Hash::make($pass); });
		// Route::get('cronAsaasPayments', function() { return \App\Console\Jobs\CronAsaasPayments::run(); });
		// Route::get('cronSupervision', function() { return \App\Console\Jobs\CronSupervision::run(); });
		Route::get('cronOrderBlocked', function(\Illuminate\Http\Request $request) { return \App\Console\Jobs\CronOrderBlocked::run($request->get('order')); });
		Route::get('cronValidDate', function(\Illuminate\Http\Request $request) { return \App\Utils\StudentClassControlUtils::cronValidDate($request->get('order')); });
		Route::get('generateByOrder', function(\Illuminate\Http\Request $request) { return (new \App\Utils\StudentClassControlUtils)->generateByOrder($request->get('order')); });
		Route::get('generateByClass', function(\Illuminate\Http\Request $request) { return (new \App\Utils\StudentClassControlUtils)->generateByClass($request->get('class')); });
		Route::get('cronScholarship', function() { return (new \App\Console\Jobs\CronScholarship)->run(); });
		Route::get('cronScholarshipAssas', function() { return (new \App\Console\Jobs\CronAsaasPayments)->scholarship(); });
		Route::get('emailScholarshipAvaliationAlert', function() {
			$scholarshipStudentList = ScholarshipStudentModel::whereHas('scholarship')
			->with('scholarship')
			->whereNotNull('payment_date')
			// ->where('student_id', 11304)
			->get();
			$count = 0;

			foreach ($scholarshipStudentList as &$scholarshipStudent) {
				$avaliationStudent = AvaliationStudentModel::query()
				->where('avaliation_id', $scholarshipStudent->scholarship->avaliation_id)
				->where('student_id', $scholarshipStudent->student_id)
				->get();

				if (count($avaliationStudent) == 0) {
					// \App\Mail\EmailScholarshipAvaliationAlert::toSend($scholarshipStudent->id);
					$count++;
				}
			}

			return $count;
		});
	});
	*/

	Route::group(['prefix' => 'api'], function() {
		Route::get('student/{id?}', 'Admin\ApiController@student');
		Route::get('student/{student}/{resource}', 'Admin\ApiController@studentResources')->where('resource', 'order');
	});

	/*
	Route::get('allClass/{studentId}', function($studentId) {
		$classModel = \App\Model\api\Prospection\ClassModel::get();
		$studentClassControlUtils = new \App\Utils\StudentClassControlUtils;
		$orderIds = [];

		foreach ($classModel as $class) {
			$order = new \App\Model\api\OrderModel;

			$order->fill([
				'student_id' => $studentId,
				'course_id' => $class->course_id,
				'class_id' => $class->id,
				'number_parcel' => 1,
				'value' => 0,
				'status' => 'AP',
				'imported' => '2',
			])->save();

			$studentClassControlUtils->generateByOrder($order->id);

			$orderIds[] = $order->id;
		}

		return $orderIds;
	});
	*/

	Route::get('/', 'Admin\HomeController@index')->name('admin.dashboard');

	Route::group([ 'prefix' => 'classes' ], function() {
		$ctrll = 'Admin\ClassesController@';
		$name = 'admin.classes';

		Route::post('/save', "{$ctrll}save")->name($name);
		Route::get('/delete/{id}', "{$ctrll}delete")->name($name);
	});

	Route::group(['prefix' => 'prospection'], function () {

		Route::group([ 'prefix' => 'dashboard' ], function () {
			$ctrll = 'Admin\Prospection\DashboardController@';
			$name = 'admin.prospection.dashboard';

			Route::get('', "{$ctrll}dashboard")->name($name)->middleware([ 'pageConfig:prospectionDashboard:read' ]);
			Route::get('last30DaysPCX', "{$ctrll}last30DaysPCX")->name($name);
		});

		$pcxRoute = function($type) {
			return function () use ($type) {
				$ctrll = 'Admin\Prospection\Leads\LeadsController@';
				$name = 'admin.prospection.'.$type;

				Route::get('', "{$ctrll}list")->name($name)->middleware([ "pageConfig:{$type}:read" ]);
				Route::get('/insert', "{$ctrll}insert")->name($name)->middleware([ "pageConfig:{$type}:insert" ]);
				Route::get('/update/{id}', "{$ctrll}update")->name($name)->middleware([ "pageConfig:{$type}:update" ]);
				Route::get('/delete/{id}', "{$ctrll}delete")->name($name)->middleware([ "pageConfig:{$type}:delete" ]);
				Route::get('/enable/{id}', "{$ctrll}enable")->name($name)->middleware([ "pageConfig:{$type}:enable" ]);
				Route::post('/save', "{$ctrll}save")->name($name)->middleware([ "pageConfig:{$type}:save" ]);

				Route::post('/phone_contact', "{$ctrll}phoneContactSave")->name($name);
				Route::get('/phone_contact/delete/{id}', "{$ctrll}phoneContactDelete")->name($name);
				Route::get('/phone_contact/enable/{id}', "{$ctrll}phoneContactEnable")->name($name);

				Route::get('/json', "{$ctrll}getJson")->name($name);
				Route::get('/dataTables', "{$ctrll}getDataTables")->name($name);
				Route::post('/import', "{$ctrll}import")->name($name);
				Route::post('/exists_email', "{$ctrll}existsEmail")->name($name);
			};
		};

		Route::group([
			'prefix' => 'prospect_hot',
			'middleware' => ['injectTypeLeads:PH']
		], $pcxRoute('prospect_hot'));

		Route::group([
			'prefix' => 'prospect',
			'middleware' => ['injectTypeLeads:P']
		], $pcxRoute('prospect'));

		Route::group([
			'prefix' => 'client',
			'middleware' => ['injectTypeLeads:C']
		], $pcxRoute('client'));

		Route::group([
			'prefix' => 'former_client',
			'middleware' => ['injectTypeLeads:X']
		], $pcxRoute('former_client'));

		Route::group([ 'prefix' => 'guestbook' ], function () {
			$ctrll = 'Admin\Prospection\GuestBook\GuestBookController@';
			$name = 'admin.prospection.guestbook';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('update', "{$ctrll}form")->name($name);
			Route::get('/', "{$ctrll}list")->name($name);
			Route::get('/insert/{idLead?}/{idLeadsVisit?}', "{$ctrll}insert")->name($name);
			Route::get('/update/{id}', "{$ctrll}update")->name($name);
			Route::get('/delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('/enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('/save', "{$ctrll}save")->name($name);
			Route::post('/phone_contact', "{$ctrll}savePhoneContact")->name($name);
			Route::post('/pos_visit', "{$ctrll}savePosVisit")->name($name);
			Route::post('/lead', "{$ctrll}saveLead")->name($name);
			Route::post('/schedule', "{$ctrll}saveLeadsVisit")->name($name);
			Route::get('getHTMLquestionPCX/{flgType}', "{$ctrll}getHTMLquestionPCX")->name($name);
		});

		Route::group([ 'prefix' => 'visitSchedule' ], function () {
			$ctrll = 'Admin\Prospection\VisitSchedule\VisitScheduleController@';
			$name = 'admin.prospection.visitSchedule';

			Route::get('/', "{$ctrll}list")->name($name);
			Route::post('/schedule', "{$ctrll}scheduleSave")->name($name);
		});

		//NÃO SEI ONDE ESTÁ SENDO USADO
		// Route::get('dashboard-modelo', 'Admin\Prospection\DashboardController@dashboardModelo');
		// Route::get('/matriculationList', 'Admin\Prospection\MatriculationListController@list');
		// Route::get('/waitingList', 'Admin\Prospection\WaitingListController@list');

	});

	Route::group([ 'prefix' => 'routine_management' ], function () {
		Route::group([ 'prefix' => 'productivity' ], function () {
			$ctrll = 'Admin\ProductivityController@';
			$name = 'admin.routine_management.productivity';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:productivity:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:productivity:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:productivity:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:productivity:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:productivity:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:productivity:save' ]);
		});

		Route::group([ 'prefix' => 'goal_pcx' ], function () {
			$ctrll = 'Admin\RoutineManagement\GoalPCXController@';
			$name = 'admin.routine_management.goal_pcx';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:goalPcx:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:goalPcx:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:goalPcx:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:goalPcx:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:goalPcx:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:goalPcx:save' ]);

			Route::group([ 'prefix' => 'full' ], function () {
				$ctrll = 'Admin\RoutineManagement\GoalPCXFullController@';
				$name = 'admin.routine_management.goal_pcx.full';

				Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:goalPcx:insert' ]);
				Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:goalPcx:update' ]);
				Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:goalPcx:delete' ]);
				Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:goalPcx:enable' ]);
				Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:goalPcx:save' ]);
				Route::get('remove/{type}/{id}', "{$ctrll}removePCXA")->name($name);
				Route::post('phone-contact', "{$ctrll}phoneContactSave")->name($name);
			});
		});

		Route::group([ 'prefix' => 'activities' ], function () {
			$ctrll = 'Admin\RoutineManagement\ActivitiesGoalPCXController@';
			$name = 'admin.routine_management.activities';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:activities:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:activities:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:activities:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:activities:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:activities:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:activities:save' ]);
			Route::get('/json', "{$ctrll}getJson")->name($name);
		});

		Route::group([ 'prefix' => 'dashboard' ], function () {
			$ctrll = 'Admin\RoutineManagement\DashboardController@';
			$name = 'admin.routine_management.dashboard';

			Route::get('', "{$ctrll}dashboard")->name($name)->middleware([ 'pageConfig:routineManagementDashboard:read' ]);
		});

		Route::group([ 'prefix' => 'report_goal_pcx' ], function () {
			$ctrll = 'Admin\RoutineManagement\ReportGoalPCXController@';
			$name = 'admin.routine_management.report_goal_pcx';

			Route::get('', "{$ctrll}report")->name($name)->middleware([ 'pageConfig:reportGoalPcx:read' ]);
			Route::post('data', "{$ctrll}getData")->name($name);
			Route::post('report', "{$ctrll}getReport")->name($name);
		});
	});

	Route::group(['prefix' => 'prospection'], function () {
		// Módulo cursos
		Route::group([ 'prefix' => 'course_category_type' ], function () {
			$ctrll = 'Admin\Prospection\Course\CourseCategoryTypeController@';
			$name = 'admin.course_management.course_category_type';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:courseCategoryType:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:courseCategoryType:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:courseCategoryType:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:courseCategoryType:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:courseCategoryType:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:courseCategoryType:save' ]);
		});

		Route::group([ 'prefix' => 'course_category' ], function () {
			$ctrll = 'Admin\Prospection\Course\CourseCategoryController@';
			$name = 'admin.course_management.course_category';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:courseCategory:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:courseCategory:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:courseCategory:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:courseCategory:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:courseCategory:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:courseCategory:save' ]);
		});

		Route::group([ 'prefix' => 'course_subcategory' ], function () {
			$ctrll = 'Admin\Prospection\Course\CourseSubcategoryController@';
			$name = 'admin.course_management.course_subcategory';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:courseSubcategory:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:courseSubcategory:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:courseSubcategory:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:courseSubcategory:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:courseSubcategory:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:courseSubcategory:save' ]);
			Route::post('values', "{$ctrll}saveValues")->name($name);
		});

		Route::group([ 'prefix' => 'course' ], function () {
			$ctrll = 'Admin\Prospection\Course\CourseController@';
			$name = 'admin.course_management.course';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:course:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:course:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:course:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:course:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:course:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:course:save' ]);
		});

		Route::group([ 'prefix' => 'class' ], function () {
			$ctrll = 'Admin\Prospection\ClassGroup\ClassController@';
			$name = 'admin.course_management.class';

			Route::get('', "{$ctrll}list")->name($name)->middleware([ 'pageConfig:class:read' ]);
			Route::get('insert', "{$ctrll}insert")->name($name)->middleware([ 'pageConfig:class:insert' ]);
			Route::get('update/{id}', "{$ctrll}update")->name($name)->middleware([ 'pageConfig:class:update' ]);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name)->middleware([ 'pageConfig:class:delete' ]);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name)->middleware([ 'pageConfig:class:enable' ]);
			Route::post('save', "{$ctrll}save")->name($name)->middleware([ 'pageConfig:class:save' ]);
		});

		Route::group([ 'prefix' => 'content_course', 'middleware' => [ 'pageConfig:class' ], ], function () {
			$ctrll = 'Admin\Prospection\Course\ContentCourseController@';
			$name = 'admin.course_management.content_course';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'bonus_course', 'middleware' => [ 'pageConfig:bonusCourse' ], ], function () {
			$ctrll = 'Admin\Prospection\Course\BonusCourseController@';
			$name = 'admin.course_management.bonus_course';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'included_items', 'middleware' => [ 'pageConfig:includedItems' ], ], function () {
			$ctrll = 'Admin\Prospection\Course\IncludedItemsController@';
			$name = 'admin.course_management.included_items';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'file', 'middleware' => [ 'pageConfig:file' ], ], function () {
			$ctrll = 'Admin\Prospection\File\FileController@';
			$name = 'admin.course_management.file';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
			// Route::get('download', "{$ctrll}list")->name($name.'download');
		});

		Route::group([ 'prefix' => 'video', 'middleware' => [ 'pageConfig:video' ], ], function () {
			$ctrll = 'Admin\Prospection\VideoController@';
			$name = 'admin.course_management.video';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		// Módulo Gestão Aluno
		Route::group([
			'prefix' => 'student',
			'middleware' => [ 'pageConfig:student' ],
		], function () {
			$ctrll = 'Admin\Prospection\Student\StudentController@';
			$name = 'admin.student_management.student';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
			Route::get('orderParcel', "{$ctrll}orderParcel")->name($name);
			// Route::post('upContract/{id}', "{$ctrll}save")->name($name);
			Route::post('transactionGenerated', "{$ctrll}transactionGenerated")->name($name);
			Route::get('generateContract/{id}', "{$ctrll}generateContract")->name($name);
			Route::get('viewContract/{id}', "{$ctrll}viewContract")->name($name);
			Route::post('generateTransaction', "{$ctrll}generateTransaction")->name($name);

			Route::post('getAjax', "{$ctrll}getAjax");
			Route::post('getListAjax', "{$ctrll}getListAjax");
			Route::get('matriculationTransfer/{id}/{status?}', "{$ctrll}matriculationTransfer");
			Route::post('getValueNotPaid', "{$ctrll}getValueNotPaid");
			Route::post('cancellationProcess', "{$ctrll}cancellationProcess");

			Route::get('supervision', "{$ctrll}listSupervision")->name('admin.student_management.student.supervision');
			Route::get('supervision/finish/{id}', "{$ctrll}finish");
			Route::get('supervision/rollback/{id}', "{$ctrll}rollback");
		});

		Route::group([ 'prefix' => 'registration', 'middleware' => [ 'pageConfig:registration' ], ], function () {
			$ctrll = 'Admin\Prospection\Registration\RegistrationController@';
			$name = 'admin.student_management.registration';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		// Route::group([ 'prefix' => 'registry', 'middleware' => [ 'pageConfig:registry' ], ], function () {
		// 	$ctrll = 'Admin\Prospection\Registry\RegistryController@';
		// 	$name = 'admin.student_management.registry';

		// 	Route::get('', "{$ctrll}list")->name($name);
		// 	Route::get('insert', "{$ctrll}insert")->name($name);
		// 	Route::get('update/{id}', "{$ctrll}update")->name($name);
		// 	Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		// 	Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		// 	Route::post('save', "{$ctrll}save")->name($name);

		// 	Route::post('/payment_history', "{$ctrll}savePaymentHistory")->name($name);
		// 	Route::get('/payment_history_dlt/{id}', "{$ctrll}deletePaymentHistory")->name($name);
		// 	Route::post('/phone_contact', "{$ctrll}savePhoneContact")->name($name);

		// });

		// Route::group([ 'prefix' => 'class_list', 'middleware' => [ 'pageConfig:registry' ], ], function () {
		// 	$ctrll = 'Admin\Prospection\ClassGroup\ClassListController@';
		// 	$name = 'admin.student_management.class_list';

		// 	Route::get('', "{$ctrll}list")->name($name);
		// 	Route::get('insert', "{$ctrll}insert")->name($name);
		// 	Route::get('update/{id}', "{$ctrll}update")->name($name);
		// 	Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		// 	Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		// 	Route::post('save', "{$ctrll}save")->name($name);
		// });

		// Route::get('/file/download/{nameFile}', 'Admin\Prospection\File\FileDownloadController@download')->middleware('auth:admin');
		// Route::get('/file_download', 'Admin\Prospection\File\FileDownloadController@list')->middleware('auth:admin');
	});

	// Módulo cursos
	Route::group([ 'prefix' => 'course_supervision', 'middleware' => [ 'pageConfig:courseSupervision' ], ], function () {
		$ctrll = 'Admin\CourseSupervisionController@';
		$name = 'admin.course_management.course_supervision';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'place', 'middleware' => [ 'pageConfig:place' ], ], function () {
		$ctrll = 'Admin\PlaceController@';
		$name = 'admin.course_management.place';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'other_inf', 'middleware' => [ 'pageConfig:otherInf' ], ], function () {
		$ctrll = 'Admin\OtherInfController@';
		$name = 'admin.other_inf';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'other_inf_type', 'middleware' => [ 'pageConfig:otherInfType' ], ], function () {
		$ctrll = 'Admin\OtherInfTypeController@';
		$name = 'admin.other_inf_type';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'student_registration', 'middleware' => [ 'pageConfig:studentRegistration' ], ], function() {
		$ctrll = 'Admin\StudentRegistrationController@';
		$name = 'admin.student_registration';

		Route::get('', "{$ctrll}index")->name($name);
	});

	// Módulo Gestão Aluno
	Route::group([ 'prefix' => 'make_student_registration', 'middleware' => [ 'pageConfig:makeStudentRegistration' ], ], function () {
		$ctrll = 'Admin\MakeStudentRegistrationController@';
		$name = 'admin.student_management.make_student_registration';

		Route::get('', "{$ctrll}index")->name($name);
		Route::post('', "{$ctrll}save")->name($name);
		Route::post('get_order', "{$ctrll}getOrder")->name($name);
	});

	Route::group([ 'prefix' => 'class_student_registration', 'middleware' => [ 'pageConfig:classStudentRegistration' ], ], function () {
		$ctrll = 'Admin\MakeStudentRegistrationController@';
		$name = 'admin.student_management.class_student_registration';

		Route::get('', "{$ctrll}index")->name($name);
		Route::post('', "{$ctrll}save")->name($name);
		Route::post('get_order', "{$ctrll}getOrder")->name($name);
	});

	Route::group([ 'prefix' => 'class_release', 'middleware' => [ 'pageConfig:classRelease' ], ], function () {
		$ctrll = 'Admin\ClassReleaseController@';
		$name = 'admin.student_management.class_release';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('update/{id}', "{$ctrll}form")->name($name);
		Route::post('getList', "{$ctrll}getList")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'avaliation_student', 'middleware' => [ 'pageConfig:avaliationStudent' ], ], function () {
		$ctrll = 'Admin\AvaliationStudentController@';
		$name = 'admin.avaliation_student';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('update/{id}', "{$ctrll}form")->name($name);
		Route::post('getList', "{$ctrll}getList")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
		Route::get('getEvaluationNotDone', "{$ctrll}getEvaluationNotDone")->name($name);
	});

	// Módulo Gestão Financeira
	Route::group([ 'prefix' => 'introduction', 'middleware' => [ 'pageConfig:introduction' ], ], function () {
		$ctrll = 'Admin\Financial\IntroductionController@';
		$name = 'admin.finance_management.introduction';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'bank_account', 'middleware' => [ 'pageConfig:bankAccount' ], ], function () {
		$ctrll = 'Admin\Financial\BankAccountController@';
		$name = 'admin.finance_management.bank_account';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'contract', 'middleware' => [ 'pageConfig:contract' ], ], function () {
		$ctrll = 'Admin\Financial\ContractController@';
		$name = 'admin.finance_management.contract';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'form_payment', 'middleware' => [ 'pageConfig:formPayment' ], ], function () {
		$ctrll = 'Admin\FormPaymentController@';
		$name = 'admin.finance_management.form_payment';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'type_payment', 'middleware' => [ 'pageConfig:typePayment' ], ], function () {
		$ctrll = 'Admin\TypePaymentController@';
		$name = 'admin.finance_management.type_payment';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	// Informação Empresa
	Route::group([ 'prefix' => 'schoolinformation', 'middleware' => [ 'pageConfig:schoolInformation' ], ], function () {
		$ctrll = 'Admin\SchoolInformationController@';
		$name = 'admin.schoolinformation';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	// Informação Usuário
	Route::group([ 'prefix' => 'user', 'middleware' => [ 'pageConfig:user' ], ], function () {
		$ctrll = 'Admin\UserController@';
		$name = 'admin.user';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	// Informação Blog
	Route::group([ 'prefix' => 'blog', 'middleware' => [ 'pageConfig:blogPost' ], ], function () {
		$ctrll = 'Admin\BlogController@';
		$name = 'admin.blog.post';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
		Route::get('/removeTags/{id}', "{$ctrll}removeTags")->name($name);
	});

	// Informação Bolsas de Estudo
	Route::group([ 'prefix' => 'scholarship', 'middleware' => [ 'pageConfig:scholarship' ], ], function () {
		$ctrll = 'Admin\ScholarshipController@';
		$name = 'admin.scholarship.post';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::get('{rankingOrEnrolled}/{id}', "{$ctrll}rankingOrEnrolled")->name($name)->where('rankingOrEnrolled', 'ranking|enrolled');
		Route::post('save', "{$ctrll}save")->name($name);
		Route::get('test/{id}', "{$ctrll}test")->name($name);
		Route::get('profile/{id}', "{$ctrll}viewProfile")->name($name);
		Route::post('saveprofile/{id}', "{$ctrll}saveProfile")->name($name);

		Route::prefix('student')->group(function () use ($ctrll) {
			Route::get('approve/{id}', "{$ctrll}studentToApprove");
			Route::get('delete/{id}', "{$ctrll}studentDelete");
			Route::get('enable/{id}', "{$ctrll}studentEnable");

		});
	});

	Route::group(['prefix' => 'configuration'], function () {

		// Informação Blog
		Route::group([ 'prefix' => 'blog' ], function () {

			Route::group([ 'prefix' => 'category', 'middleware' => [ 'pageConfig:blogCategory' ], ], function () {
				$ctrll = 'Admin\Configuration\BlogCategoryController@';
				$name = 'admin.blog.category';

				Route::get('', "{$ctrll}list")->name($name);
				Route::get('insert', "{$ctrll}insert")->name($name);
				Route::get('update/{id}', "{$ctrll}update")->name($name);
				Route::get('delete/{id}', "{$ctrll}delete")->name($name);
				Route::get('enable/{id}', "{$ctrll}enable")->name($name);
				Route::post('save', "{$ctrll}save")->name($name);
			});

			Route::group([ 'prefix' => 'tags', 'middleware' => [ 'pageConfig:blogTags' ], ], function () {
				$ctrll = 'Admin\Configuration\BlogTagsController@';
				$name = 'admin.blog.tags';

				Route::get('', "{$ctrll}list")->name($name);
				Route::get('insert', "{$ctrll}insert")->name($name);
				Route::get('update/{id}', "{$ctrll}update")->name($name);
				Route::get('delete/{id}', "{$ctrll}delete")->name($name);
				Route::get('enable/{id}', "{$ctrll}enable")->name($name);
				Route::post('save', "{$ctrll}save")->name($name);
				Route::get('json', "{$ctrll}json")->name($name);
			});

		});

		Route::group([ 'prefix' => 'contentpage', 'middleware' => [ 'pageConfig:page' ], ], function () {
			$ctrll = 'Admin\Configuration\ContentPageController@';
			$name = 'admin.configuration_page.contentpage';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'contentsection', 'middleware' => [ 'pageConfig:pageSection' ], ], function () {
			$ctrll = 'Admin\Configuration\ContentSectionController@';
			$name = 'admin.configuration_page.contentsection';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'city', 'middleware' => [ 'pageConfig:city' ], ], function () {
			$ctrll = 'Admin\Configuration\CityController@';
			$name = 'admin.configuration.city';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		// Route::group([ 'prefix' => 'question' ], function () {
		// 	$ctrll = 'Admin\Configuration\QuestionController@';
		// 	$name = 'admin.configuration.question';

		// 	Route::get('', "{$ctrll}list")->name($name);
		// 	Route::get('insert', "{$ctrll}insert")->name($name);
		// 	Route::get('update/{id}', "{$ctrll}update")->name($name);
		// 	Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		// 	Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		// 	Route::post('save', "{$ctrll}save")->name($name);
		// 	Route::get('alternative/remove/{id}', "{$ctrll}alternativeRemove")->name($name);

		// });

		Route::group([ 'prefix' => 'bank', 'middleware' => [ 'pageConfig:bank' ], ], function () {
			$ctrll = 'Admin\Configuration\BankController@';
			$name = 'admin.configuration.bank';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);

		});

		Route::group([ 'prefix' => 'phrase', 'middleware' => [ 'pageConfig:phrase' ], ], function () {
			$ctrll = 'Admin\Configuration\PhraseController@';
			$name = 'admin.configuration.phrase';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		//NÃO USADOS NO PROJETO CETCC
		/*
		Route::group([ 'prefix' => 'englishlevel' ], function () {
			$ctrll = 'Admin\Configuration\EnglishLevelController@';
			$name = 'admin.englishlevel';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'constructioncategory' ], function () {
			$ctrll = 'Admin\Configuration\ConstructionCategoryController@';
			$name = 'admin.constructioncategory';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'alimentationtype' ], function () {
			$ctrll = 'Admin\Configuration\AlimentationTypeController@';
			$name = 'admin.alimentationtype';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'alimentationcategory' ], function () {
			$ctrll = 'Admin\Configuration\AlimentationCategoryController@';
			$name = 'admin.alimentationcategory';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});
		*/
	});

	Route::group([ 'prefix' => 'newsletter', 'middleware' => [ 'pageConfig:newsletter' ], ], function () {
		$ctrll = 'Admin\NewsletterController@';
		$name = 'admin.newsletter';

		Route::get('', "{$ctrll}list")->name($name);
	});

	Route::group([ 'prefix' => 'content', 'middleware' => [ 'pageConfig:pageContent' ], ], function () {
		$ctrll = 'Admin\ContentController@';
		$name = 'admin.configuration_page.content';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'certification', 'middleware' => [ 'pageConfig:certification' ], ], function () {
		$ctrll = 'Admin\CertificationController@';
		$name = 'admin.configuration_page.certification';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'slide', 'middleware' => [ 'pageConfig:pageSlide' ], ], function () {
		$ctrll = 'Admin\SlideController@';
		$name = 'admin.configuration_page.slide';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'feature', 'middleware' => [ 'pageConfig:feature' ], ], function () {
		$ctrll = 'Admin\FeatureController@';
		$name = 'admin.configuration_page.feature';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'galery', 'middleware' => [ 'pageConfig:galery' ], ], function () {
		$ctrll = 'Admin\GaleryController@';
		$name = 'admin.configuration_page.galery';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
		Route::post('save-imgs', "{$ctrll}saveImgs")->name($name);
		Route::post('delete-imgs', "{$ctrll}delImg")->name($name);
	});

	Route::group([ 'prefix' => 'link_footer', 'middleware' => [ 'pageConfig:linkFooter' ], ], function () {
		$ctrll = 'Admin\GaleryController@';
		$name = 'admin.configuration_page.link_footer';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'patient', 'middleware' => [ 'pageConfig:patient' ], ], function () {
		$ctrll = 'Admin\Clinic\PatientController@';
		$name = 'admin.clinic.patient';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'psychologist', 'middleware' => [ 'pageConfig:psychologist' ], ], function () {
		$ctrll = 'Admin\Clinic\PsychologistController@';
		$name = 'admin.clinic.psychologist';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'testemonial', 'middleware' => [ 'pageConfig:testemonial' ], ], function () {
		$ctrll = 'Admin\TestemonialController@';
		$name = 'admin.testemonial';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	/*Route::group([ 'prefix' => 'event' ], function () {
		$ctrll = 'Admin\EventController@';
		$name = 'admin.event';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});*/

	Route::group([ 'prefix' => 'faq', 'middleware' => [ 'pageConfig:faq' ], ], function () {
		$ctrll = 'Admin\FaqController@';
		$name = 'admin.faq';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group(['prefix' => 'configurationTeam'], function () {

		Route::group([ 'prefix' => 'team', 'middleware' => [ 'pageConfig:team' ], ], function () {
			$ctrll = 'Admin\TeamController@';
			$name = 'admin.configurationTeam.team';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'function', 'middleware' => [ 'pageConfig:function' ], ], function () {
			$ctrll = 'Admin\Configuration\FunctionController@';
			$name = 'admin.configurationTeam.function';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

		Route::group([ 'prefix' => 'graduation', 'middleware' => [ 'pageConfig:graduation' ], ], function () {
			$ctrll = 'Admin\Configuration\GraduationController@';
			$name = 'admin.configurationTeam.graduation';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});
	});

	Route::group(['prefix' => 'configuration'], function () {
		Route::group([ 'prefix' => 'office', 'middleware' => [ 'pageConfig:office' ], ], function () {
			$ctrll = 'Admin\Configuration\OfficeController@';
			$name = 'admin.configurationTeam.office';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});
	});

	/*Route::group([ 'prefix' => 'work' ], function () {
		$ctrll = 'Admin\WorkController@';
		$name = 'admin.work';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::get('view/{id}', "{$ctrll}view")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});*/

	Route::group([ 'prefix' => 'additional', 'middleware' => [ 'pageConfig:additional' ], ], function () {
		$ctrll = 'Admin\AdditionalController@';
		$name = 'admin.additional';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'discount', 'middleware' => [ 'pageConfig:discount' ], ], function () {
		$ctrll = 'Admin\DiscountController@';
		$name = 'admin.discount';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'question' ], function () {
		$ctrll = 'Admin\QuestionController@';
		$name = 'admin.question';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
		Route::get('alternative/remove/{id}', "{$ctrll}alternativeRemove")->name($name);

	});

	Route::group([ 'prefix' => 'avaliation' ], function () {
		$ctrll = 'Admin\AvaliationController@';
		$name = 'admin.avaliation';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
		Route::get('alternative/remove/{id}', "{$ctrll}alternativeRemove")->name($name);

	});

		// tela do sistema
		Route::group([ 'prefix' => 'system_screen' ], function () {
			$ctrll = 'Admin\SystemScreenController@';
			$name = 'admin.system_screen';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

	// perfil do usuário
	Route::group([ 'prefix' => 'profile' ], function () {
		$ctrll = 'Admin\UserProfileController@';
		$name = 'admin.profile';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);

	});

	//NÃO USADOS NO PROJETO CETCC
	/*Route::group([ 'prefix' => 'construction' ], function () {
		$ctrll = 'Admin\ConstructionController@';
		$name = 'admin.construction';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'alimentation' ], function () {
		$ctrll = 'Admin\AlimentationController@';
		$name = 'admin.alimentation';

		Route::get('', "{$ctrll}list")->name($name);
		Route::get('insert', "{$ctrll}insert")->name($name);
		Route::get('update/{id}', "{$ctrll}update")->name($name);
		Route::get('delete/{id}', "{$ctrll}delete")->name($name);
		Route::get('enable/{id}', "{$ctrll}enable")->name($name);
		Route::post('save', "{$ctrll}save")->name($name);
	});

	Route::group([ 'prefix' => 'config' ], function () {

		Route::group([ 'prefix' => 'page_module' ], function () {

			$ctrll = 'Admin\PageModuleController@';
			$name = 'admin.pageModule';

			Route::get('', "{$ctrll}list")->name($name);
			Route::get('insert', "{$ctrll}insert")->name($name);
			Route::get('update/{id}', "{$ctrll}update")->name($name);
			Route::get('delete/{id}', "{$ctrll}delete")->name($name);
			Route::get('enable/{id}', "{$ctrll}enable")->name($name);
			Route::post('save', "{$ctrll}save")->name($name);
		});

	});*/
});
