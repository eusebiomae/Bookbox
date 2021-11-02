<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Prospection\CourseModel;

class LoginController extends _Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index(Request $request)
    {
        $flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$product = CourseModel::where('course_category_id')->get();

		$products = CourseModel::where('course_category_id', 2)->get();

		$editions = CourseModel::where('course_category_id', 1)->get();

		// return $pageComponents;
		return view('site/bookbox/components/login')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('product', $product)
			->with('products', $products)
			->with('editions', $editions);

   }
}
