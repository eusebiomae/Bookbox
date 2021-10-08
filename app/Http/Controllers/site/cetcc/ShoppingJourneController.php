<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Prospection\CourseModel;
use App\Model\api\StudentModel;
use Illuminate\Support\Facades\Auth;

class ShoppingJourneController extends _Controller
{

	public function index(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);
		$products = CourseModel::get();

				// return $pageComponents;
				// return $products;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('products', $products);
	}

	public function pricing(Request $request)
	{
		$flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$products = CourseModel::where('course_category_id', 2)->get();

				// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('products', $products);
	}

	public function signature(Request $request)
	{
		$flgPage = $request->get('flgPage');
		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$product = null;
		if ($request->has('product')) {
			$product = CourseModel::query()
			->with([
				'courseFormPayment.formPayment',
			])
			->find($request->get('product'));
		}

		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('product', $product);
	}

	public function login(Request $request) {
		$credentials = [
			'email' => $request->get('email'),
			'password' => $request->get('password'),
		];

		return Auth::guard('studentArea')->attempt($credentials, true) ? Auth::guard('studentArea')->user() : ['errors' => [['description' => 'Senha Inválida']]];
	}

	public function resetPassword(Request $request) {
		$user = StudentModel::where('email', $request->get('email'))->first();

		if ($user) {
			$withInput['codeResponse'] = 201;

			$resetPasswordCode = 'subscriberArea-' . generate_uuid();

			$user->update([ 'reset_password_code' => $resetPasswordCode ]);

			\Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\ResetPasswordMail($user));
		}
	}
}
