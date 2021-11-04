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
			return CronAsaasPayments::asaasSubscriptions($company, $appConf);
		}

		// CronAsaasPayments::asaasSubscriptions($companies, $appConf);

		$appConf->fill([
			'cron_asaas_payments' => \Carbon\Carbon::now(),
		])->save();
	}

	static function asaasSubscriptions($company, $appConf) {
		$date = $appConf->cron_asaas_payments;
		$currentDate = date('Y-m-d');
		$offset = 0;
		$limit = 100;
		$isRepeat = false;
		$dataAsaas = [];

		$orderModel = OrderModel::query()
		->with(['orderParcel'])
		->whereIn('status', ['PE', 'AP'])
		->where('asaas_type', 'subscriptions')
		// ->where('id', 65)
		->get();

		foreach ($orderModel as $order) {
			try {
				$asaas = asaas([
					'token' => $order->asaas_token,
					'path' => "{$company->asaas_url}{$order->asaas_type}/{$order->asaas_payments_code}/payments",
				]);

				if ($asaas) {
					foreach ($asaas->data as $asaasIndx => $asaasData) {

						if (isset($order->orderParcel[$asaasIndx])) {
							$order->orderParcel[$asaasIndx]->fill([
								'asaas_code' => $asaasData->id,
								'asaas_json' => json_encode($asaasData),
							])->save();
							$dataAsaas[] = [ $order->orderParcel[$asaasIndx], $asaasData ];
						} else {
							$orderParcel = new OrderParcelModel;

							$orderParcel->fill([
								'order_id' => $order->id,
								'form_payment_id' => $order->form_payment_id,
								'code' => base_convert(time() . mt_rand(0, 0xffff), 10, 36),
								'due_date' => $asaasData->dueDate,
								'payday' => $asaasData->paymentDate,
								'value' => $asaasData->value,
								'n' => $asaasIndx + 1,
								'value_paid' => $asaasData->value,
								'bank_id' => $order->bank_id,
								'asaas_code' => $asaasData->id,
								'asaas_json' => json_encode($asaasData),
							])->save();

							$dataAsaas[] = [ $orderParcel, $asaasData ];
						}

					}
				}

			} catch (\Throwable $th) {
				throw $th;
			}
		}

		return $dataAsaas;
	}

}
