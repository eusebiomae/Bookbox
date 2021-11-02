<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('contentsection', 'api\Configuration\ContentSectionController');

Route::get('contentsection/contentpage/{id}', 'api\Configuration\ContentSectionController@getByContentPage');

Route::resource('contentpage', 'api\Configuration\ContentPageController');
// Route::resource('page', 'api\PageController');
Route::resource('content', 'api\ContentController');

Route::post('save', function(Request $request) {
	return (new App\Http\Controllers\api\ApiSaveController)->{$request->header('method')}($request);
});

Route::post('saveLead', 'api\LeadController@save');

// Route::get('splitLeads', function() {
// 	$sellers = UserModel::where('consultant', 'S')->get();
// 	$sellersCount = count($sellers);

// 	$leads = LeadsModel::with('leadsPhoneCall')->whereDoesntHave('leadsPhoneCall')->get();

// 	foreach ($leads as $lead) {
// 		$lead->seller()->sync([ $sellers[rand(0, $sellersCount - 1)]->id ]);
// 	}

// 	return count($leads);
// });

Route::get('get', function(Request $request) {
	return (new App\Http\Controllers\api\GetApiController)->{$request->header('method')}($request);
});

Route::get('state', 'api\GetApiController@state');
Route::get('city', 'api\GetApiController@city');
Route::get('product/{id}', 'api\GetApiController@product');

Route::group(['prefix' => 'validate'], function() {
	Route::post('cpf', 'api\ValidateController@cpf');
	Route::post('cpf_exist', 'api\ValidateController@cpfExist');
});

Route::group([ 'prefix' => 'ays' ], function () {
	Route::get('firstStudentClassControlEAD', 'AysController@firstStudentClassControlEAD');
});
