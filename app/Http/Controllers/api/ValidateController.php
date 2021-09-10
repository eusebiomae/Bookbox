<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\api\StudentModel;
use App\Lib\CPFValidator;
use Illuminate\Support\Facades\Request;

class ValidateController extends Controller {

	public function cpf(Request $request) {
		if ($request::get('cpf')) {
		 	$cpf = preg_replace('/\D/', '', $request::get('cpf'));

			return (new CPFValidator)->isValid($cpf) ? 1 : 0;
		}

		// vazio
		return -3;
	}

	public function cpfExist(Request $request) {
		if ($request::get('cpf')) {
			if (!$this->cpf($request)) {
				// cpf invalido
				return -1;
			}

			$cpf = preg_replace('/\D/', '', $request::get('cpf'));

			$student = StudentModel::where('cpf', $cpf)->first();
			// 1 cadastrado
			// 0 nao cadastrado
			return $student ? 1 : 0;
		}

		// vazio
		return -3;
	}

}
