<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();

Route::group([ 'middleware' => 'web', ], function () {

	Route::group([
		'prefix' => 'login',
	], function() {
		$ctrll = 'LoginController@';

		Route::get('', "{$ctrll}index")->name('studentArea.login');
		Route::post('', "{$ctrll}login");
		Route::post('register', "{$ctrll}register");
		Route::get('logout', "{$ctrll}logout")->name('studentArea.logout');
		Route::post('resetSendEmail', "{$ctrll}resetSendEmail");
		Route::post('resetPassword', "{$ctrll}resetPassword");
	});

	Route::group([ 'prefix' => 'api' ], function() {
		Route::post('account_data', 'AccountDataController@saveData');
		Route::post('confirm_payment', 'ConfirmPaymentController@confirmPayment');
		Route::post('loginRegister', 'AccountDataController@loginRegister');
		Route::post('apply_discount', 'ConfirmPaymentController@applyDiscount');
		Route::post('saveStudentSocioeconomic', 'AccountDataController@saveStudentSocioeconomic');
		Route::get('studentSocioeconomic/{studentId}', 'AccountDataController@getStudentSocioeconomic');
		Route::get('emailConfirmationScholarship/{id}', function($id) { return \App\Mail\EmailConfirmationScholarship::toSend($id); });
		Route::get('emailResultsScholarship/{id}', function($id) { return \App\Mail\EmailResultsScholarship::toSend($id); });
	});

	Route::post('account_data/save', "AccountDataController@toSave");

	Route::group([
		'middleware' => 'auth:studentArea',
	], function() {
		Route::get('', 'HomeController@index')->name('studentArea.dashboard');

		Route::group([
			'prefix' => 'account_data',
			'middleware' => [],
		], function () {
			$ctrll = 'AccountDataController@';

			Route::get('', "{$ctrll}index");
		});

		Route::group([
			'prefix' => 'order',
			'middleware' => [],
		], function () {
			$ctrll = 'OrderController@';

			Route::get('course', "{$ctrll}listCourse");
			Route::get('supervision', "{$ctrll}listSupervision");
			Route::get('newsupervision', "{$ctrll}newSupervision");
			Route::get('{id}', "{$ctrll}details")->where('id', '[0-9]+');
			Route::get('makeSupervision/{id}', "{$ctrll}makeSupervision");

			// Route::post('setAnswer', "{$ctrll}setAnswer");
		});

		Route::group([
			'prefix' => 'scholarship',
			'middleware' => [],
		], function () {
			$ctrll = 'ScholarshipController@';

			Route::get('', "{$ctrll}index");
			Route::get('proofProficiency/{id}', "{$ctrll}proofProficiency");
			Route::get('viewProofProficiency/{id}', "{$ctrll}viewProofProficiency");
			Route::get('classification/{id}', "{$ctrll}classification");
		});

	});
});

Route::group([
	'prefix' => 'historic_video',
	'middleware' => [],
], function () {
	$ctrll = 'HistoricVideoController@';

	Route::get('', "{$ctrll}index");
	Route::post('save', "{$ctrll}store");
});

Route::group([
	'prefix' => 'order',
	'middleware' => [],
], function () {
	$ctrll = 'OrderController@';

	Route::get('getNextClassesRelease/{orderId}/{classesId?}', "{$ctrll}getNextClassesRelease");
	Route::get('getModuleClasses/{orderId}/{classesId}', "{$ctrll}getModuleClasses");
});

Route::group([
	'prefix' => 'avaliation',
	'middleware' => [],
], function () {
	$ctrll = 'AvaliationController@';

	Route::get('{id}', "{$ctrll}get");
	Route::post('finalize', "{$ctrll}finalize");
	Route::get('evaluated/{avaliation_id}/{student_id}', "{$ctrll}evaluated");
	Route::get('student/{orderId}/{avaliationId}/{studentId}', "{$ctrll}getAvaliationStudent");
});
