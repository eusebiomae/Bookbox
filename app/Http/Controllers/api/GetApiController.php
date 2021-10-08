<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\api\Configuration\CityModel;
use App\Model\api\Configuration\StateModel;
use Illuminate\Http\Request;

class GetApiController extends Controller {
	public function state() {
		return StateModel::orderBy('name')->get([ 'id', 'initials', 'name' ]);
	}

	public function city(Request $request) {
		$cityModel = CityModel::query();

		if ($request->has('stateId')) {
			$cityModel->where('state_id', $request->get('stateId'));
		}

		return $cityModel->orderBy('name')->get([ 'id', 'name' ]);
	}
}
