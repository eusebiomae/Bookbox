<?php

namespace App\Http\Controllers\site\cetcc;

use Illuminate\Http\Request;
use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Prospection\CourseModel;

use App\Mail\ResellerMail;
use App\Model\api\ResellerRegistrationModel;
use Illuminate\Support\Facades\Mail;

class RegisterController extends _Controller
{
    public function index(Request $request)
    {
        $flgPage = $request->get('flgPage');

		$pageComponents = ContentPageModel::getByComponent($flgPage);

		$product = CourseModel::where('course_category_id')->get();

		$products = CourseModel::where('course_category_id', 2)->get();

		$editions = CourseModel::where('course_category_id', 1)->get();

		// return $pageComponents;
		return view('site/bookbox/pages/default')
			->with('flgPage', $flgPage)
			->with('pageComponents', $pageComponents)
			->with('product', $product)
			->with('products', $products)
			->with('editions', $editions);

   }

   public function store(Request $request) {
    $data = array(
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'type_trade' => $request->type_trade,
        'trade_name' => $request->trade_name,
        'message_pt' => $request->message_pt
    );

    Mail::to( config('mail.from.address') )
    ->send( new ResellerMail($data));

    return back();

}


   public function save(Request $request) {
    (new ResellerRegistrationModel())->fill($request->all())->save();

     return redirect()->back();
 }

}
