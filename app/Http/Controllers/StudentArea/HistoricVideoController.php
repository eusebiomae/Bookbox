<?php

namespace App\Http\Controllers\StudentArea;

use App\Http\Controllers\Controller;
use App\Model\api\HistoricVideoModel;
use App\Model\api\OrderModel;
use App\Utils\StudentClassControlUtils;
use Illuminate\Http\Request;

class HistoricVideoController extends Controller
{

	public function index()
	{
		//
	}

	public function store(Request $request) {
		$historicVideoModel = HistoricVideoModel::where([
			'order_id' => $request->get('order_id'),
			'video_lesson_id' => $request->get('video_lesson_id'),
		])->first();

		if (!$historicVideoModel) {
			$historicVideoModel = new HistoricVideoModel;
		}

		$historicVideoModel->fill($request->all())->save();

		return $historicVideoModel;
	}

}
