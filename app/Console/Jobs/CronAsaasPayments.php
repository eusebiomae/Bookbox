<?php

namespace App\Console\Jobs;

use App\Model\api\AppConfModel;
use App\Model\api\OrderModel;
use App\Model\api\OrderParcelModel;
use App\Model\api\ScholarshipStudentModel;
use App\Model\api\SchoolInformationModel;

class CronAsaasPayments {
	public static function run() {
		$appConf = AppConfModel::first();
		$schoolInformation = SchoolInformationModel::get();
		$companies = [];
		$asaasPayment = [];

		foreach ($schoolInformation as $company) {
			$companies[$company->id] = $company;
			$asaasPayment[$company->id] = CronAsaasPayments::asaasPayment($company, $appConf);
		}

		// CronAsaasPayments::asaasSubscriptions($companies, $appConf);

		$appConf->fill([
			'cron_asaas_payments' => \Carbon\Carbon::now(),
		])->save();
	}

	static function asaasPayment($company, $appConf) {
		$date = $appConf->cron_asaas_payments;
		$currentDate = date('Y-m-d');
		$offset = 0;
		$limit = 100;
		$isRepeat = false;
		$dataAsaas = [];

		do {
			try {
				$asaas = asaas([
					'token' => $company->asaas_token,
					'path' => "{$company->asaas_url}payments?limit={$limit}&offset={$offset}&paymentDate%5Bge%5D={$date}&paymentDate%5Ble%5D={$currentDate}",
				]);

				if (isset($asaas->data)) {
					$data = $asaas->data;
					$dataAsaas = array_merge($dataAsaas, $data);

					for ($i = count($data) - 1; $i > -1; $i--) {
						$item = $data[$i];

						$orderParcel = OrderParcelModel::where('asaas_code', $item->id)->first();

						if ($orderParcel) {
							$dataToSave = [
								'asaas_json' => json_encode($item),
								'payday' => $item->paymentDate,
							];

							if (!empty($item->originalValue)) {
								$dataToSave['value_paid'] = $item->value;
							}

							$orderParcel->fill($dataToSave)->save();
						}
					}

					$isRepeat = $asaas->hasMore;
					$offset += $limit;
				}
			} catch (\Throwable $th) {
				throw $th;
			}

		} while($isRepeat);

		return $dataAsaas;
	}

	static function asaasSubscriptions($companies, $appConf) {
		$date = $appConf->cron_asaas_payments;
		$currentDate = date('Y-m-d');
		$offset = 0;
		$limit = 100;
		$isRepeat = false;
		$company = $companies[2];

		$orders = OrderModel::select(['asaas_customers_code', 'asaas_payments_code', 'id', 'student_id', 'asaas_json', 'status'])->where('asaas_payments_code', 'like', 'sub_%')->get();

		$asaas = [];

		foreach($orders as $order) {
			$asaas[] = asaas([
				'token' => $company->asaas_token,
				'path' => "subscriptions?limit={$limit}&offset={$offset}&customer={$order->asaas_customers_code}",
			]);
		}

		do {
			try {
				$asaas = asaas([
					'token' => $company->asaas_token,
					'path' => "payments?limit={$limit}&offset={$offset}&paymentDate%5Bge%5D={$date}&paymentDate%5Ble%5D={$currentDate}",
				]);

				if (isset($asaas->data)) {
					$data = $asaas->data;

					for ($i = count($data) - 1; $i > -1; $i--) {
						$item = $data[$i];

						$orderParcel = OrderParcelModel::where('asaas_code', $item->id)->first();

						if ($orderParcel) {
							$dataToSave = [
								'asaas_json' => json_encode($item),
								'payday' => $item->paymentDate,
							];

							if (!empty($item->originalValue)) {
								$dataToSave['value_paid'] = $item->value;
							}

							$orderParcel->fill($dataToSave)->save();
						}
					}

					$isRepeat = $asaas->hasMore;
					$offset += $limit;
				}
			} catch (\Throwable $th) {
				throw $th;
			}
		} while($isRepeat);
	}

	static function scholarship() {
		$company = SchoolInformationModel::first();
		$scholarshipStudent = ScholarshipStudentModel::query()
			->whereNotNull('asaas_payments_code')
			->whereNull('payment_date')
			->whereRaw("IFNULL(status, '') NOT IN ('CANCELED')")
			->get();

		$payments = [];
		count($scholarshipStudent);

		foreach ($scholarshipStudent as $item) {
			try {
				if (empty($item->asaas_token)) {
					$item->fill([ 'asaas_token' => '172a2a842ff1ed23c7feb4adcd1db7e34f9f88786ad8b687104a1cd192e17491' ])->save();
				}

				$asaas = asaas([
					'token' => $item->asaas_token,
					'path' => "{$company->asaas_url}payments/{$item->asaas_payments_code}",
				]);

				$dataFill = [
					'status' => 'ERROR',
				];

				if ($asaas) {
					$payments[] = $asaas;

					$dataFill['status'] = $asaas->deleted ? 'CANCELED' : $asaas->status;
					$dataFill['payment_date'] = $asaas->confirmedDate ?? $asaas->paymentDate;
					$dataFill['value_paid'] = $asaas->value;
					$dataFill['asaas_json'] = json_encode($asaas);
				}

				$item->fill($dataFill)->save();
			} catch (\Throwable $th) {
				//throw $th;
			}
		}

		return $payments;

		return $scholarshipStudent;
	}
}
