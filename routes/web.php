<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'site\cetcc\HomeController@index')->middleware(['injectFlgPage:home']);


Route::get('/contact', 'site\cetcc\ContactController@index')->middleware(['injectFlgPage:contact']);
Route::post('/contact/save', 'site\cetcc\ContactController@save')->middleware(['injectFlgPage:contact']);
Route::get('/about', 'site\cetcc\AboutController@index')->middleware(['injectFlgPage:about']);
Route::get('/supervision', 'site\cetcc\SupervisionController@index')->middleware(['injectFlgPage:supervision']);

Route::get('/teacher', 'site\cetcc\TeacherController@index')->middleware(['injectFlgPage:teacher']);
Route::get('/teacher/{id}', 'site\cetcc\TeacherController@teacher')->middleware(['injectFlgPage:teachers_details']);
Route::get('/team/{id}', 'site\cetcc\TeacherController@teacher')->middleware(['injectFlgPage:team_details']);
Route::get('/certification', 'site\cetcc\CertificationController@index')->middleware(['injectFlgPage:certification']);

Route::get('/collaborator', 'site\cetcc\CollaboratorController@index')->middleware(['injectFlgPage:collaborator']);
Route::get('/collaborator/{id}', 'site\cetcc\CollaboratorController@collaborator')->middleware(['injectFlgPage:collaborator']);

Route::get('/photos', 'site\cetcc\PhotosController@index')->middleware(['injectFlgPage:photos']);
Route::get('/photos/{id}', 'site\cetcc\PhotosController@index')->middleware(['injectFlgPage:photos']);
Route::get('/add_psychologist', 'site\cetcc\PsychologistController@add')->middleware(['injectFlgPage:add_psychologist']);
Route::post('/add_psychologist/save', 'site\cetcc\PsychologistController@save');
Route::get('/add_patient', 'site\cetcc\PatientController@add')->middleware(['injectFlgPage:add_patient']);
Route::post('/add_patient/save', 'site\cetcc\PatientController@save')->middleware(['injectFlgPage:add_patient']);
Route::get('/doc', 'site\cetcc\DocController@index')->middleware(['injectFlgPage:doc']);
Route::get('/recommendation', 'site\cetcc\RecommendationController@index')->middleware(['injectFlgPage:recommendation']);
Route::get('/faq', 'site\cetcc\FaqController@index')->middleware(['injectFlgPage:faq']);
Route::get('/shopping_journey', 'site\cetcc\ShoppingJourneController@index')->middleware(['injectFlgPage:shopping_journey']);

Route::get('/blog_post', 'site\cetcc\BlogController@index')->middleware(['injectFlgPage:blog_post']);

Route::get('/box_blog', 'site\cetcc\BlogController@index')->middleware(['injectFlgPage:box_blog']);

Route::get('/article', 'site\cetcc\BlogController@index')->middleware(['injectFlgPage:article']);

Route::get('/blog/{id}/{title?}', 'site\cetcc\BlogController@getPost')->middleware(['injectFlgPage:blog']);
Route::get('/article/{id}/{title?}', 'site\cetcc\BlogController@getPost')->middleware(['injectFlgPage:article']);

Route::get('/blog/liked/{id}/{isLiked}', 'site\cetcc\BlogController@liked')->middleware(['injectFlgPage:blog']);
Route::post('/comment', 'site\cetcc\CommentController@post')->middleware(['injectFlgPage:comment']);
Route::get('/comment/blog/{blogId}', 'site\cetcc\CommentController@getByBlog')->middleware(['injectFlgPage:comment']);
Route::post('/fetchComment', 'site\cetcc\CommentController@fetchComment')->middleware(['injectFlgPage:comment']);
Route::get('/search', 'site\cetcc\SearchController@search')->middleware(['injectFlgPage:search']);

Route::get('/scholarship', 'site\cetcc\ScholarshipController@index')->middleware(['injectFlgPage:scholarship']);

Route::get('/satisfaction_survey', 'site\cetcc\SatisfactionSurveyController@index');
Route::post('/satisfaction_survey', 'site\cetcc\SatisfactionSurveyController@save');

Route::get('/link', function() {
	return file_get_contents(base_path() . '/public/maundy/index.html');
});

Route::get('course', 'site\cetcc\CourseController@default')->middleware(['injectFlgPage:course']);

Route::get('course/{id}', 'site\cetcc\CourseController@courseDetails')->middleware(['injectFlgPage:course_details']);

Route::get('resetPassword/{code}', function(Request $request, $code) {
	preg_match('/^(\w+)\-.+/', $code, $match);

	switch ($match[1]) {
		case 'studentArea':
			return view('student_area.login.login')->with('resetPasswordCode', $code);
		break;
	}

	return [$code, $request->all()];
});

Route::get('emailConfirmation/{code}', function(Request $request, $code) {
	preg_match('/^(\w+)\-.+/', $code, $match);

	switch ($match[1]) {
		case 'studentArea':
			$student = \App\Model\api\StudentModel::where('email_confirmation_code', $code)->first();
			if ($student) {
				$student->fill(['email_confirmation_code' => null])->save();
			}
		break;
	}

	return redirect('student_area/login');
});

Route::post('newsletter', function(Request $request) {
	(new App\Model\api\NewsletterModel)->fill($request->all())->save();

	return redirect()->back()->withInput([
		'feedbackMessages' => [
			[
				'type' => 'success',
				'title' => 'Newsletters',
				'body' => 'Você se cadastrou com sucessom! Aguarde novidades!',
			]
		]
	]);
});

Route::group([
	'prefix' => 'bill',
	'middleware' => [],
], function () {
	$ctrll = '@';

	Route::get('{table}/{id}', '\App\Http\Controllers\StudentArea\BillController@index')->where('table', 'order|orderParcel');
});

Route::get('download/{nameFile}', '\App\Http\Controllers\Admin\Prospection\File\FileController@download');

Route::get('avaliation_file/{orderId}/{avaliationId}/{fileName}', '\App\Http\Controllers\Admin\Prospection\File\FileController@avaliationFile');

$mapCourseParam = [
	'ead' => [
		'flgPage' =>'ead',
		'flgCourse' =>'ead',
		'typeCourse' =>'course',
	],
	'presential' => [
		'flgPage' =>'presential',
		'flgCourse' =>'presential',
		'typeCourse' =>'course',
	],
	'semipresential' => [
		'flgPage' =>'semipresential',
		'flgCourse' =>'semipresential',
		'typeCourse' =>'course',
	],
	'lecture' => [
		'flgPage' =>'lecture',
		'flgCourse' =>'lecture',
		'typeCourse' =>'lecture',
	],
	'workshops' => [
		'flgPage' =>'workshops',
		'flgCourse' =>'workshop',
		'typeCourse' =>'workshop',
	],
];

Route::get('/{url}/{idCategory?}', function(Request $request, $url, $idCategory = null) use ($mapCourseParam) {
	foreach ($mapCourseParam[$url] as $key => $value) {
		$request[$key] = $value;
	}

	if (isset($idCategory)) {
		$request['idCategory'] = $idCategory;
	}

	return (new App\Http\Controllers\site\cetcc\CourseController)->default($request);
})->where('url', implode('|', array_keys($mapCourseParam)));
